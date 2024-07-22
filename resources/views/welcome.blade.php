@extends('layouts.layout')

@section('content')
<div class="container_mx">
    <div class="flex flex-col items-center justify-between space-y-4 font-bold md:flex-row md:space-y-0">
        <h1 class="text-center md:text-left">Welcome To Tour Booking</h1>
        <div class="relative w-full max-w-xs">
            <input
                type="text"
                placeholder="Search Tour"
                class="w-full py-2 pl-4 pr-10 border rounded"
            />
            <svg class="absolute text-gray-500 transform -translate-y-1/2 top-1/2 right-3" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 21l-4.35-4.35M18.5 10.5a7.5 7.5 0 1 0-15 0 7.5 7.5 0 0 0 15 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-10 mx-2 mt-4 md:grid-cols-3 md:mx-0">
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
