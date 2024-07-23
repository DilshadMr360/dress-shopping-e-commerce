<head>
    @vite('resources/css/app.css')
</head>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <table class="w-full  text-sm text-left rtl:text-right text-gray-500  border border-gray-200 ">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">
                    Category ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Category Type
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-6 py-4 border-r border-gray-200 font-medium text-gray-900 whitespace-nowrap">
                    {{ $category->id}}

                </td>
                <td class="px-6 py-4">
                    {{ $category->category_type}}

                </td>
                <!-- Optional: Add an action column -->
                <td class="px-6 py-4 text-right border-r border-gray-200">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
        @endforeach

    </table>
</div>
