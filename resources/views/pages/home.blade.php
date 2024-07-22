@extends('layouts.layout')

@section('content')
<div class=" container_mx">
    <div class="flex flex-col items-center justify-between space-y-4 font-bold md:flex-row md:space-y-0">

    </div>
    <div class="grid grid-cols-1 gap-10 mx-10 mt-4 md:grid-cols-3 md:mx-0">
        <div class="mb-2">
            <div class="relative">
                <img src="{{ asset('images/dress2.jpg') }}" alt="Tour" class="w-full rounded-lg h-72">
                <div class="absolute top-2 right-2">
                    <button class="text-white">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>
            </div>
            <h1>Amani long sleeve printed shirt</h1>
            <p>Rs 1690</p>
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
    </div>
</div>


@endsection
