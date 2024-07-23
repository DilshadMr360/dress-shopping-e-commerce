<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css') <!-- Assuming you are using Vite for Tailwind CSS -->
</head>
<body>
<header class="text-white" style="background-color: {{ config('colors.defaultColor1') }}">
    <div class="flex items-center justify-between container_mx">
        <!-- Logo -->
        <div class="hidden -ml-3 text-2xl font-bold md:block"> <!-- Hide on mobile -->
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16">
        </div>

        <!-- Toggle icon visible on mobile -->
        <div class="md:hidden">
            <button onclick="toggleMenu()">
                &#9776; <!-- Simple menu icon -->
            </button>
        </div>

        <!-- Navigation links with icons -->
        <nav id="navLinks" class="hidden md:flex md:items-center md:space-x-3">
            <div>
                hi  {{ Auth::user()->name }}
            </div>
            @if (Auth::check() && Auth::user()->role != 'admin')
            <div class="relative">
                <a href="#" class="block px-3 py-2 text-white rounded-lg md:inline-block hover:bg-gray-700">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <span class="absolute inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-black transform translate-x-1/2 -translate-y-1/2 bg-yellow-500 rounded-full right-1 top-2">0</span>
            </div>
            <div class="relative">
                <a href="#" class="block px-3 py-2 text-white rounded-lg md:inline-block hover:bg-gray-700">
                    <i class="fas fa-heart"></i>
                </a>
                <span class="absolute inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-black transform translate-x-1/2 -translate-y-1/2 bg-yellow-500 rounded-full right-1 top-2">0</span>
            </div>
    @endif

            <!-- User Icon with Dropdown -->
            <div class="relative">
                <button onclick="toggleDropdown()" class="block px-3 py-2 text-white rounded-lg md:inline-block hover:bg-gray-700">
                    <i class="fas fa-user"></i>
                </button>
                <!-- Dropdown Menu -->
                <div id="userDropdown" class="absolute right-0 hidden w-48 mt-2 text-black bg-white rounded-lg shadow-lg">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-200">Update Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 text-left hover:bg-gray-200">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>

<script>
    function toggleMenu() {
        var navLinks = document.getElementById('navLinks');
        if (navLinks.classList.contains('hidden')) {
            navLinks.classList.remove('hidden');
            navLinks.classList.add('flex', 'flex-col', 'space-y-3');
        } else {
            navLinks.classList.remove('flex', 'flex-col', 'space-y-3');
            navLinks.classList.add('hidden');
        }
    }

    function toggleDropdown() {
        var dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('hidden');
    }

    function checkScreenSize() {
        var navLinks = document.getElementById('navLinks');
        if (window.innerWidth >= 768) {
            navLinks.classList.remove('hidden', 'flex', 'flex-col', 'space-y-3');
            navLinks.classList.add('md:flex', 'md:items-center', 'md:space-x-3');
        } else {
            navLinks.classList.add('hidden');
            navLinks.classList.remove('md:flex', 'md:items-center', 'md:space-x-3');
        }
    }

    window.addEventListener('resize', checkScreenSize);
    window.addEventListener('load', checkScreenSize);
</script>
</body>
</html>
