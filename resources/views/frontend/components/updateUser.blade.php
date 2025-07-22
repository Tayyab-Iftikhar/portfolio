<div class="min-vh-87">
    <div class="fw-bold text-center my-2 fs-6 text-black font-helvetica">Create New User</div>
    <div class="d-flex justify-content-center">
        <form id="updateUserForm" data-id="{{ $users->id }}" method="POST"
            class="bg-white py-5 rounded shadow-lg my-2 mx-5 p-5 col-md-5">

            @method('PUT')
            @csrf

            <div id="response"></div>

            <div class="mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name"
                    value="{{ $users->name }}" />
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Your Email"
                    value="{{ $users->email }}" />
            </div>

            <div class="mb-3">
                <label for="role" class="form-label fw-bold">Select Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Your Password"
                    value="{{ $users->password }}" />
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="Confirm Your Password" value="{{ $users->password }}" />
            </div>

            <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary">Update
                    User</button>
            </div>

        </form>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#updateUserForm').submit(function (e) {
            e.preventDefault();

            let userId = $(this).data('id');
            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: '/updateUser/' + userId,
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