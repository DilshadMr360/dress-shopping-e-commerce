@extends('layouts.layout')

@section('content')

@if (Auth::check() && Auth::user()->role != 'admin')
<div class=" container_mx">
    @if($products->isEmpty())
    <p>No products found</p>
@else
    <div class="grid grid-cols-1 gap-10 mx-10 mt-4 md:grid-cols-4 md:mx-0">
        @foreach ($products as $product)
        <div class="mb-2 border rounded-lg">
            <div class="relative">
                <div>
                <img src="{{ asset('storage/ProductImages/' . $product->upload_part_image) }}" class="w-full h-40 rounded-md" alt="profile Pic">
                </div>
                <div class="absolute top-2 right-2">
                    <button class="text-white">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
            </div>
             <div>
                {{$product->product_title }}

             </div>
             <div>
            {{$product->product_description }}

             </div>

             <div>
                {{$product->price }}

                 </div>


            <div class="flex items-end justify-between">
                <button
                    class="flex items-center justify-center w-full h-10 text-white"
                    style="background-color: {{ config('colors.defaultColor1') }}"

                >
                    Add to cart
                    <i class="ml-2 fas fa-shopping-cart"></i>
                </button>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endif

@endsection
