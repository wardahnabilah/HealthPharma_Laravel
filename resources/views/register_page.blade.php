<x-layout>
    <main>
        <div class="p-5 w-form mx-auto rounded-4 shadow">
            <h1 class="fs-4 fw-bold text-center mb-5">Sign Up</h1>
            <form action="/register" method="POST" class="d-flex flex-column gap-3">
                @csrf
                <div class="d-flex flex-column gap-3 mb-4">
                    <div>
                        <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                        @error('fullname')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <select name="role" id="role" class="form-select">
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="employee">Regular Employee</option>
                        </select>
                        @error('role')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    @error('username')
                        <div class="error-message">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password" class="form-control" placeholder="Password (min 8 characters)">
                    @error('password')
                        <div class="error-message">{{$message}}</div>
                    @enderror
                </div>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                <button class="btn btn-primary w-100 mt-5 text-uppercase fs-btn fw-semibold">Sign Up</button>
            </form> 
        </div>
    </main>
</x-layout>