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
<!-- Cart Icon with Dropdown -->
<div class="relative">
    <a href="#" class="block px-3 py-2 text-white rounded-lg md:inline-block hover:bg-gray-700" onclick="toggleCartDropdown()">
        <i class="fas fa-shopping-cart"></i>
    </a>
    <span class="absolute inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-black transform translate-x-1/2 -translate-y-1/2 bg-yellow-500 rounded-full right-1 top-2">{{ count(session()->get('cart', [])) }}</span>
    <!-- Cart Dropdown Menu -->
    <div id="cartDropdown" class="absolute right-0 z-50 hidden h-auto mt-2 text-black bg-white rounded-lg shadow-lg w-96">
        <div class="p-4">
            <p class="text-lg font-bold">Total: {{ array_sum(array_column(session()->get('cart', []), 'quantity')) }}</p>
            @forelse(session()->get('cart', []) as $item)
                <div class="max-w-xs p-2 mb-2 border border-red-500 rounded-lg">
                    <div class="relative">
                        <!-- Product Image -->
                        <img src="{{ asset('storage/ProductImages/' . $item['photo']) }}" alt="image" class="object-cover w-16 h-16 rounded-md">
                        <!-- Heart Icon -->

                        <!-- Heart Icon -->
                        <div class="absolute top-2 right-2">
                            <button class="text-xs text-white hover:text-red-400">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Product Title -->
                    <div class="mt-2 text-sm font-semibold">
                        {{ $item['product_name'] }}
                    </div>
                    <!-- Product Price -->
                    <div class="mt-1 text-sm font-bold">
                        ${{ $item['price'] * $item['quantity'] }}
                    </div>
                    <!-- Quantity -->
                    <div class="mt-1 text-xs text-gray-600">
                        Quantity: {{ $item['quantity'] }}
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600">Your cart is empty.</p>
            @endforelse
            <a href="{{ route('view_cart') }}" class="block px-4 py-2 mt-2 text-center text-blue-500 hover:bg-gray-200">View All</a>
        </div>
    </div>
</div>


            <!-- Wishlist Icon with Dropdown -->
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

    function toggleCartDropdown() {
        var cartDropdown = document.getElementById('cartDropdown');
        cartDropdown.classList.toggle('hidden');
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
