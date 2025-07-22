<div class="mt-3 d-flex justify-content-center">
    <form action="" method="GET" class="bg-white rounded shadow-lg my-1 px-3">
        <div class="my-3">
            <h4 class="text-center fw-bold">Filter By Name</h4>
            <div class="d-flex justify-content-center">
                <div>
                    <input type="text" name="product_name" class="form-control" placeholder="Enter a Name" />
                </div>
                <div class="mx-1">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="card shadow-lg my-4 border-0">
                <div class="card-header bg-white pb-3">
                    <h3>All Tasks</h3>
                </div>
                <div class="card-body px-5 bg-white rounded">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border border-dark px-2 text-center align-middle text-black">Task Name</th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Task Type</th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Created By</th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Project Name
                                </th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Deadline</th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr id="task-{{ $task->id }}">
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $task->task_name }}
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $task->taskType->type_name }}
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $task->createdBy->name}}
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $task->project->project_name }}
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $task->task_deadline }}
                                    </td>
                                    <td
                                        class="d-flex border border-black border-start-0 border-top-0 align-items-center justify-content-center col-md-12 gap-2">
                                        <a href="{{ route('frontend.taskDetails', $task->id) }}" class="btn btn-success">See
                                            Details</a>
                                        <div class="col-md-5">
                                            <select id="assign-user" data-id="{{ $task->id }}"
                                                class="form-control assign-user-select" required>
                                                <option value="">Assign To:</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name }} : {{ $user->getRoleNames()->first() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <a href="{{ route('frontend.updateTask', $task->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('frontend.deleteTask', $task->id) }}"
                                            class="btn btn-danger del-btn" data-id="{{ $task->id }}">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    //Removal Logic

    const csrfToken = document.querySelector('meta[name="csrf-token"]').content
    document.querySelectorAll('.del-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const taskId = this.dataset.id;

            fetch(`/deleteTask/${taskId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })

                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`task-${taskId}`).remove();
                    } else {
                        alert('Error deleting task.');
                    }
                })
                .catch(error => {
                    console.error('AJAX error:', error);
                });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.assign-user-select').on('change', function () {
            const assignedToUid = $(this).val();
            const taskId = $(this).data('id');
            const selectElement = $(this);

            if (assignedToUid !== '') {
                $.ajax({
                    url: "{{ route('frontend.assign.task') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        task_id: taskId,
                        assigned_to_uid: assignedToUid,
                        time_taken: '0'
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Task assigned successfully!');
                            selectElement.prop('disabled', true);
                        } else {
                            alert('Something went wrong!');
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        alert('Error occurred during task assignment.');
                    }
                });
            }
        });
    });
</script>