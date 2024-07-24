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
          @if (@session('cart'))
                @foreach (session('cart') as $id => $details )
                @php $total +=  $details['price'] * $details['quantity']  @endphp

                <tr data-id="{{$id}}" class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900 border-r border-gray-200 whitespace-nowrap">
                        {{$id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$details['product_name'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{$details['price'] }}
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/ProductImages/' . $details['photo']) }}" class="w-20 h-20 rounded-md" alt="profile Pic">

                    </td>
                    <td class="px-6 py-4">
                        <input type="number" value="{{ $details['quantity'] }}" class="border rounded p-2 quantity cart_update" min="1">
                    </td>
                    <td class="px-6 py-4">
                        {{$details['quantity'] * $details['price']  }}
                    </td>
                    <td class="px-6 py-4 text-right border-r border-gray-200">
                        <a href="" class="font-medium text-blue-600 hover:underline cart_remove">Delete</a>
                    </td>
                </tr>

          @endforeach
            @endif
        </tbody>


    </table>

</div>

<div class="font-bold mt-5 flex  justify-end container_mx">
    <h1>Total {{$total}}</h1>
</div>
<div class="mx-2 mt-5 flex  justify-end gap-2 ">
    <a href="{{ route('home') }}">
        <button class="text-white w-52 h-10 rounded-md" style="background-color: {{ config('colors.defaultColor1') }}">
            <h1>Continue Shopping</h1>
        </button>
    </a>
    <form action="{{route('session')}}" method="POST">

 <input type="hidden" name="_token" value="{{csrf_token()}}">
    <button class="text-white w-52 h-10 rounded-md"  style="background-color: {{ config('colors.defaultColor1') }}">
        <h1>Check out</h1>
    </button>
</div>
</form>
<script>

    $(".cart_remove").click(function (e){
        e.preventDefault();

        var ele  = $(this);

        if(confirm("Do you really want to remove")){
            $.ajax({
                url: '{{route('removecart')}}',
                 method: "DELETE",
                 data: {
                    _token: '{{ csrf_token()}}',
                 id: ele.parents("tr").attr("data-id"),
                 },
                 success: function (response){
                    window.location.reload();
                 }

            });

        }
        });

    $(".cart_update").change(function (e){
    e.preventDefault();

    var ele = $(this);

    $.ajax({
        url: '{{route('updatecart')}}',
        method: "PATCH",
        data: {
            _token: '{{ csrf_token() }}',
            id: ele.parents("tr").attr("data-id"),
            quantity: ele.parents("tr").find(".quantity").val()
        },
        success: function (response) {
            window.location.reload();
        }
    });
    });


</script>
