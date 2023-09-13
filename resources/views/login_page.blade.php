<x-layout>
    <main>
        <div class="p-5 w-form mx-auto rounded-4 shadow">
            <h1 class="fs-4 fw-bold text-center mb-5">Login</h1>
            @error('login_failed')
                <div class="error-message-md">{{$message}}</div>
            @enderror
            <form action="/login" method="POST" class="d-flex flex-column gap-3">
                @csrf
                <div>
                    <input type="text" name="username_login" class="form-control" placeholder="Username">
                    @error('username_login')
                        <div class="error-message">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password_login" class="form-control" placeholder="Password">
                    @error('password_login')
                        <div class="error-message">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-primary w-100 mt-4 text-uppercase fs-btn fw-semibold">Login</button>
            </form>
            <p class="mb-0 pt-5 pb-3 fs-7 text-center">Belum mempunyai akun?</p>
            <div class="w-100 text-center">
                <a href="/register" class="mx-auto link-primary link-underline link-underline-opacity-0 fw-bold">Buat Akun</a href="/register">
            </div>    
        </div>
    </main>
</x-layout>