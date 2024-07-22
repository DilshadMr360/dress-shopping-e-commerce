<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="w-screen min-h-screen md:flex">
    <div class="md:w-8/12">
        <img src="{{ asset('images/dress2.jpg') }}" alt="image" class="w-full h-screen ">
    </div>
    <div class="flex items-center justify-center w-8/12 mx-auto mt-2 md:w-4/12 md:-mt-10">
        <div class="w-full mx-5 space-y-8 mt-10">
            <div>
                <h2 class="text-2xl font-bold text-center poppins-font" style="color: {{ config('colors.defaultColor1') }}">Register</h2>
                <h2 class="mt-5 text-sm text-center">Register to continue your journey. Access exclusive features and personalized experience.</h2>
            </div>
            <form class="md:space-y-10 " action="{{ route('loginshow') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="User Name" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="" >
                <input type="email" name="email" placeholder="Email" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" value="" >
                <input type="password" name="password" placeholder="Password" class="block w-full px-3 py-2 mt-4 border border-gray-300 rounded-md shadow-sm focus:outline-none" >
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="block w-full px-3 py-2 mt-4 border border-gray-300 rounded-md shadow-sm focus:outline-none" >

                <button type="submit" class="w-full px-4 py-2 mt-4 text-white border border-transparent rounded-md shadow-sm" style="background-color: {{ config('colors.defaultColor1') }}">Register</button>
                <div class="text-sm text-center">
                    <h1>or</h1>
                    <p>Already have an Account ? <span><a href="{{ route('loginshow') }}" class="font-bold underline" style="color: {{ config('colors.defaultColor1') }}">Sign In</a></span></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
