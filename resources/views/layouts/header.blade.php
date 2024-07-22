<!-- resources/views/components/header.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
<header class="p-4 text-white" style="background-color: {{ config('colors.defaultColor1') }}">
    <div class="container flex items-center justify-between mx-auto border-hidden">
        <!-- Tour Booking title -->
        <div class="hidden text-2xl font-bold md:block"> <!-- Hide on mobile -->
            <img src="{{ asset('images/logo.png') }}" alt="image" class="w-20 " >

        </div>

        <!-- Toggle icon visible on mobile -->
        <div class="md:hidden">
            <button onclick="toggleMenu()">
                &#9776; <!-- Simple menu icon -->
            </button>
        </div>
        <!-- Navigation links -->
        <nav id="navLinks" class="md:flex md:items-center md:space-x-3 hidden">
            <a href="/home" class="block px-3 py-2 text-white rounded-lg md:inline-block hover:bg-gray-700">Home</a>
            <a href="/dashboard" class="block px-3 py-2 text-white rounded-lg md:inline-block hover:bg-gray-700">Dashboard</a>
            <a href="/booking" class="block px-3 py-2 text-white rounded-lg md:inline-block hover:bg-gray-700">Booking</a>
        </nav>
    </div>
</header>

<script>
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('hidden');
    }
</script>
</body>
</html>
