

<nav style="background-color: {{ config('colors.defaulColor2') }}">
    <div class="py-4 container_mx">
        <div class="flex items-center mx-2 ">
            <ul class="flex flex-row mt-0 space-x-8 text-sm font-medium rtl:space-x-reverse">
                <li>
                    <a href="#" class="text-white "  aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="text-white ">Company</a>
                </li>
                <li>
                    <a href="#" class="text-white ">Team</a>
                </li>
                <li>
                    <a href="#" class="text-white ">Features</a>
                </li>
            </ul>

            <div class="relative w-full max-w-xs ml-auto">
                <input
                    type="text"
                    placeholder="Search Product"
                    class="w-full py-2 border rounded"
                />
                <svg class="absolute text-gray-500 transform -translate-y-1/2 top-1/2 right-3" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 21l-4.35-4.35M18.5 10.5a7.5 7.5 0 1 0-15 0 7.5 7.5 0 0 0 15 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>
</nav>
