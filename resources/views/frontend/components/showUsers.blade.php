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
                    <h3>All Users</h3>
                </div>
                <div class="card-body px-5 bg-white rounded">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border border-dark px-2 text-center align-middle text-black">Name</th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Email
                                </th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Role
                                </th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Created At</th>
                                <th class="border border-dark px-2 text-center align-middle text-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr id="user-{{ $user->id }}">
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $user->name }}
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $user->email }}
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $user->getRoleNames()->first() }}
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle">
                                        {{ $user->created_at }}
                                    </td>
                                    <td class="border border-dark px-2 text-center align-middle col-md-2">
                                        <a href="{{ route('frontend.updateUser', $user->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('frontend.deleteUser', $user->id) }}"
                                            class="btn btn-danger del-btn" data-id="{{ $user->id }}">Remove</a>
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
            const userId = this.dataset.id;

            fetch(`/deleteUser/${userId}`, {
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
                        document.getElementById(`user-${userId}`).remove();
                        // alert('User deleted!');
                    } else {
                        alert('Error deleting user.');
                    }
                })
                .catch(error => {
                    console.error('AJAX error:', error);
                });
        });
    });
</script>