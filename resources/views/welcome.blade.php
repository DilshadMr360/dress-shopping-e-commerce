<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App Title')</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen">
    @include('layouts.header') <!-- Include the Header component -->

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('layouts.footer') <!-- Include the Footer component -->
</body>
</html>
