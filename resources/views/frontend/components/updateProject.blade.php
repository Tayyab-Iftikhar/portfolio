<div class="min-vh-87">
    <div class="fw-bold text-center my-2 fs-6 text-black font-helvetica">Update Project</div>
    <div class="d-flex justify-content-center">
        <form id="updateProjectForm" data-id="{{ $projects->id }}" method="POST"
            class="bg-white py-5 rounded shadow-lg my-2 mx-5 p-5 col-md-5">

            @method('PUT')
            @csrf

            <div id="response"></div>

            <div class="mb-3">
                <label class="form-label fw-bold">Project Name</label>
                <input type="text" name="project_name" class="form-control" placeholder="Enter Project Name"
                    value="{{ $projects->project_name }}" />
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Project Details</label>
                <textarea name="project_description" class="form-control" rows="6"
                    placeholder="Enter Project Description">{{ $projects->project_description }}"</textarea>
            </div>

            <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary">Update
                    Project</button>
            </div>

        </form>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#updateProjectForm').submit(function (e) {
            e.preventDefault();

            let projectId = $(this).data('id');
            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: '/updateProject/' + projectId,
                method: 'PUT',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#response').html('<div class="alert alert-success">' + response.message + '</div>');
                },
                error: function (xhr) {
                    $('#response').html('<p style="color:red;">Something went wrong</p>');
                }
            });
        });
    });
</script>