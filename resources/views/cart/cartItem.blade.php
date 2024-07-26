<head>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

</head>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full text-sm text-left text-gray-500 border border-gray-200 rtl:text-right ">

        <thead class="text-xs text-gray-700 uppercase border-b border-gray-200 bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                   Product Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Photo
                </th>
                 <th scope="col" class="px-6 py-3">
                   Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                 </th>

            </tr>
        </thead>
        <tbody>
          @php $total  = 0 @endphp
          @foreach ($carts as $cartItem)
          @php
          $product = $cartItem->product; // Assuming relationship is defined in Cart model
          $total += $product->price * $cartItem->quantity;
         @endphp
           <tr data-id="{{ $cartItem->id }}" class="bg-white border-b hover:bg-gray-50">
            <td class="px-6 py-4 font-medium text-gray-900 border-r border-gray-200 whitespace-nowrap">
                {{ $cartItem->id }}
            </td>
            <td class="px-6 py-4">
                {{ $product->product_title }}
            </td>
            <td class="px-6 py-4">
                ${{ $product->price }}
            </td>
            <td class="px-6 py-4">
                <img src="{{ asset('storage/ProductImages/' . $product->upload_part_image) }}" class="w-20 h-20 rounded-md" alt="Product Image">
            </td>
            <td class="px-6 py-4">
                <input type="number" value="{{ $cartItem->quantity }}" class="p-2 border rounded quantity cart_update" min="1" data-product-id="{{ $cartItem->product_id }}">
            </td>
            <td class="px-6 py-4">
                ${{ $cartItem->quantity * $product->price }}
            </td>
            <td class="px-6 py-4 text-right border-r border-gray-200">
                <a href="#" class="font-medium text-blue-600 hover:underline cart_remove" data-product-id="{{ $cartItem->product_id }}">Delete</a>
            </td>
        </tr>

          @endforeach
        </tbody>


    </table>

</div>

<div class="flex justify-end mt-5 font-bold container_mx">
    <h1>Total ${{$total}}</h1>
</div>

<div class="flex justify-end gap-2 mx-2 mt-5 ">
    <a href="{{ route('home') }}">
        <button class="h-10 text-white rounded-md w-52" style="background-color: {{ config('colors.defaultColor1') }}">
            <h1>Continue Shopping</h1>
        </button>
    </a>


    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button class="h-10 text-white rounded-md w-52" style="background-color: {{ config('colors.defaultColor1') }}">
            <h1>Check out</h1>
        </button>
    </form>
</div>




<script>
    $(document).ready(function() {
    // Update Cart Item
    $('.cart_update').on('change', function() {
        var productId = $(this).data('product-id');
        var quantity = $(this).val();

        $.ajax({
            url: '{{ route("updatecart") }}',
            method: 'PATCH',
            data: {
                product_id: productId,
                quantity: quantity,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    location.reload();
                }
            }
        });
    });

    // Remove Cart Item
    $('.cart_remove').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');

        $.ajax({
            url: '{{ route("removecart") }}',
            method: 'DELETE',
            data: {
                product_id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    location.reload();
                }
            }
        });
    });
});

</script>
