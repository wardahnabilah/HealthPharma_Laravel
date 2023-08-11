<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="shadow-sm">
        <a href="" class="d-block px-4 py-2">
            <img width="224" src="/healthpharma-logo.png" alt="Health Pharma Logo">
        </a>
    </header>

    <div class="pt-5 pb-10">
        {{ $slot }}
    </div>
    
    <footer class="mt-auto">
        <p class="mb-0 py-3 bg-green text-center">Copyright <?php echo date("Y") ?> Healthpharma. All Rights Reserved.</p>
    </footer>
</body>
</html>