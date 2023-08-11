<x-layout>
    <main>
        <div class="p-5 w-form mx-auto rounded-4 shadow">
            <h1 class="fs-4 fw-bold text-center mb-5">Sign Up</h1>
            <form action="" class="d-flex flex-column gap-3">
                <div class="d-flex flex-column gap-3 mb-4">
                    <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                    <select name="role" id="role" class="form-select">
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="employee">Regular Employee</option>
                    </select>
                </div>
                <input type="text" name="username" class="form-control" placeholder="Username">
                <input type="text" name="password" class="form-control" placeholder="Password">
                <input type="text" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                <button class="btn btn-primary w-100 mt-5 text-uppercase fs-btn fw-semibold">Sign Up</button>
            </form>
            <p class="mb-0 pt-5 pb-4 text-center">or</p>
            <div class="w-100 text-center">
                <a href="/" class="mx-auto link-primary link-underline link-underline-opacity-0 fw-bold">Login</a href="/register">
            </div>    
        </div>
    </main>
</x-layout>