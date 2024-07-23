<nav style="background-color: {{ config('colors.defaulColor2') }}">
    <div class="py-6 container_mx">
        <div class="flex items-center gap-20 mx-2">
            <ul class="flex flex-row mt-0 space-x-8 text-sm font-medium rtl:space-x-reverse">
                <li>
                    <a href="{{ route('home') }}" class="text-white underline" aria-current="page">ALL PRODUCTS</a>
                </li>
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('home.category', ['category_id' => $category->id]) }}" class="text-white underline">{{ $category->category_type }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="relative w-full max-w-xs">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search Product" class="w-full py-2 border rounded" />
                    <button type="submit" class="absolute text-gray-500 transform -translate-y-1/2 top-1/2 right-3">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 21l-4.35-4.35M18.5 10.5a7.5 7.5 0 1 0-15 0 7.5 7.5 0 0 0 15 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
