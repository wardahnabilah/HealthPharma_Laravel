<x-layout>
    <main>
        <div class="p-5 w-form mx-auto rounded-4 shadow">
            <h1 class="fs-4 fw-bold text-center mb-5">Login</h1>
            <form action="" class="d-flex flex-column gap-3">
                <input type="text" name="username_login" class="form-control" placeholder="Username">
                <input type="text" name="password_login" class="form-control" placeholder="Password">
                <button class="btn btn-primary w-100 mt-4 text-uppercase fs-btn fw-semibold">Login</button>
            </form>
            <p class="mb-0 pt-5 pb-4 text-center">or</p>
            <div class="w-100 text-center">
                <a href="/register" class="mx-auto link-primary link-underline link-underline-opacity-0 fw-bold">Create New Account</a href="/register">
            </div>    
        </div>
    </main>
</x-layout>