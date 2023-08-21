<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Document</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="shadow-sm px-5 py-2">
        <nav class="navbar navbar-expand-lg">
            <a href="/" class="d-block">
                <img width="224" src="/healthpharma-logo.png" alt="Health Pharma Logo">
            </a>

            <div class="ms-auto">
            {{-- Sign Up, Login, Logout Button --}}
                <ul class="navbar-nav ms-5">
                {{-- Log out button --}}
                @if(auth()->check())
                        <li class="nav-item">
                            <a href="/" class="nav-link {{request()->segment(1) == '' ? 'active' : ''}}">Buat Transaksi</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a href="/transactions" class="nav-link {{request()->segment(1) == 'transactions' ? 'active' : ''}}">Data Transaksi</a>
                        </li>
                    @if(auth()->user()->role == 'admin')
                        <li class="nav-item ms-3">
                            <a href="/medicines" class="nav-link {{request()->segment(1) == 'medicines' ? 'active' : ''}}">Data Obat</a>
                        </li>
                    @endif

                    <li class="nav-item ms-5">
                        <a href="/logout" class="btn btn-outline-danger">Log Out</a>
                    </li>
                {{-- Sign up and log in button --}}
                @else
                    <li class="nav-item">
                        <a href="/register" class="btn btn-outline-success">Sign Up</a>
                    </li>
                    <li class="nav-item ps-2">
                        <a href="/" class="btn btn-outline-success">Log in</a>
                    </li>
                @endif
                </ul>
            </div>
        </nav>
    </header>

    {{-- Flash message --}}
    @if(session()->has('success'))
        <div id="flash-message" class="flash-message success d-flex align-items-center gap-2">
            <span>{{ session('success') }}</span>
            <svg id="close-btn-flash" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </div>
    @elseif(session()->has('failed'))
        <div id="flash-message" class="flash-message failed d-flex align-items-center gap-2">
            <span>{{ session('failed') }}</span>
            <svg id="close-btn-flash" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </div>
    @endif
    

    <div class="pt-5 pb-10">
        {{ $slot }}
    </div>
    
    <footer class="mt-auto">
        <p class="mb-0 py-3 bg-green text-center">Copyright <?php echo date("Y") ?> Healthpharma. All Rights Reserved.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>