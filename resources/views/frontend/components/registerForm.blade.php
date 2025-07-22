<div class="min-vh-87">
    <div class="fw-bold text-center my-2 fs-6 text-black font-helvetica">Register Yourself!</div>
    <div class="d-flex justify-content-center">
        <form action="" method="POST" class="bg-white py-5 rounded shadow-lg my-2 mx-5 p-5 col-md-5">

            @csrf

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" />
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Your Email" />
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Your Password" />
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="Confirm Your Password" />
            </div>

            <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary">Register</button>
            </div>

            <div class="d-flex justify-content-center mt-2">
                <p class="my-2">Already have an account? <a href="" class="text-decoration-none text-primary">Login</a>
                </p>
            </div>
        </form>
    </div>

</div>