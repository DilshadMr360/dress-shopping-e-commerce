
@php
    $categories = \App\Models\Category::all();
@endphp
<nav style="background-color: {{ config('colors.defaulColor2') }}">
    <div class="py-6 container_mx">
        <div class="flex items-center gap-20 mx-2">
            <ul class="flex flex-row mt-0 space-x-8 text-sm font-medium rtl:space-x-reverse">
                <button class="w-40 h-10 bg-black rounded-lg" onclick="openModal('categoryModal')">
                    <a href="#" class="text-white" aria-current="page">ADD CATEGORY</a>
                </button>
                <button class="w-40 h-10 bg-black rounded-lg" onclick="openModal('productModal')">
                    <a href="#" class="text-white" aria-current="page">ADD PRODUCTS</a>
                </button>


            </ul>


        </div>
    </div>
</nav>

{{-- call Modal --}}
<x-catergoryModal  />
<x-productModal :categories="$categories" />
{{-- call Modal --}}

<script>

    // Category
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        location.reload();

    }


</script>
