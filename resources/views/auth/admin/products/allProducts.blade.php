<head>
    @vite('resources/css/app.css')
</head>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full text-sm text-left text-gray-500 border border-gray-200 rtl:text-right ">

        <thead class="text-xs text-gray-700 uppercase border-b border-gray-200 bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">
                    Prodcut ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Prduct Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Description
                </th>
                 <th scope="col" class="px-6 py-3">
                    Product Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Product Price
                </th>

            </tr>
        </thead>
        <tbody>
           @foreach ($products as $product)

            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-6 py-4 font-medium text-gray-900 border-r border-gray-200 whitespace-nowrap">
                    {{$product->id}}
                </td>
                <td class="px-6 py-4">
                    {{$product->product_title }}
                </td>
                <td class="px-6 py-4">
                    {{$product->product_description }}
                </td>
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/ProductImages/' . $product->upload_part_image) }}" class="w-20 h-20 rounded-md" alt="profile Pic">

                </td>
                <td class="px-6 py-4">
                    {{$product->price}}
                </td>
                <td class="px-6 py-4 text-right border-r border-gray-200">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
           @endforeach

        </tbody>

    </table>
</div>
