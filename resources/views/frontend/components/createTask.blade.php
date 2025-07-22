<div class="fw-bold text-center mt-3 mb-2 fs-6 text-black">Create New Task</div>
<form id="taskForm" method="POST" class="bg-white py-5 rounded shadow-lg my-4 me-4 p-5" enctype="multipart/form-data">

    @csrf

    <div id="response"></div>

    <div class="mb-3">
        <label class="form-label fw-bold">Task Name</label>
        <input type="text" name="task_name" class="form-control" placeholder="Enter Name" />
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Task Description</label>
        <textarea name="task_description" id="task_description" class="form-control"
            placeholder="Enter Task Description" rows="6"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Task Type</label>
        <select name="task_type_id" id="task_type_id" class="form-control" required>
            <option value="">Select Task Type</option>
            @foreach ($taskTypes as $taskType)
                <option value="{{ $taskType->id }}">{{ $taskType->type_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Project</label>
        <select name="project_id" id="project_id" class="form-control" required>
            <option value="">Select Project</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Created By</label>
        <select name="created_by" id="created_by" class="form-control" required>
            <option value="">Select User</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} : {{ $user->getRoleNames()->first() }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Deadline</label>
        <input type="text" name="task_deadline" class="form-control" placeholder="Enter Deadline" />
    </div>

    <button type="submit" class="btn btn-primary">Create Task</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#taskForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '/createTask',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    $('#response').html('<div class="alert alert-success">' + response.message + '</div>');
                    $('#taskForm')[0].reset();
                },
                error: function (xhr) {
                    $('#response').html('<p style="color:red;">Something went wrong</p>');
                }
            });
        });
    });
</script>