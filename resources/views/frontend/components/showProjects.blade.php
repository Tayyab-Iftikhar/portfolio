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
                    <h3>All Projects</h3>
                </div>
                <div class="card-body px-5 bg-white rounded">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border border-dark px-2 text-center align-middle text-black">Project Name
                                </th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Project
                                    Description
                                </th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr id="project-{{ $project->id }}">
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $project->project_name }}
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle">
                                        Click on details to see {{ $project->project_name }}'s description/details.
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle">
                                        <a href="{{ route('frontend.projectDetails', $project->id) }}"
                                            class="btn btn-success">See Details</a>
                                        <a href="{{ route('frontend.updateProject', $project->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('frontend.deleteProject', $project->id) }}"
                                            class="btn btn-danger del-btn" data-id="{{ $project->id }}">Remove</a>
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
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content
    document.querySelectorAll('.del-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const projectId = this.dataset.id;

            fetch(`/deleteProject/${projectId}`, {
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
                        document.getElementById(`project-${projectId}`).remove();
                        // alert('Project deleted!');
                    } else {
                        alert('Error deleting project.');
                    }
                })
                .catch(error => {
                    console.error('AJAX error:', error);
                });
        });
    });
</script>