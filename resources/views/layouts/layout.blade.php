<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">
    <header class="flex-none">
        @include('layouts.header')
    </header>

    @if (Auth::check() && Auth::user()->role == 'user')
    <header class="flex-none">
        @include('layouts.productlist')
    </header>
    @endif

    @if (Auth::check() && Auth::user()->role == 'admin')
    <header class="flex-none">
        @include('auth.admin.addproduct')
    </header>
    @endif



    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="flex-none">
        @include('layouts.footer')
    </footer>
</body>
</html>
