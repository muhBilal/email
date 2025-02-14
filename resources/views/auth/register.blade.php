@extends('auth.app')

@section('title', 'Sign Up')

@section('content')
<div class="bg-white rounded-lg shadow-lg flex flex-col md:flex-row max-w-4xl w-full">
    
    <div class="hidden md:flex md:w-1/2 bg-orange-500 rounded-l-lg p-8 items-center justify-center relative">
        <img alt="Two women, one holding a megaphone, standing in front of an orange background with building silhouettes"
            class="absolute inset-0 w-full h-full object-cover rounded-l-lg"
            height="800" src="{{ asset('images/auth.png') }}" width="600"/>
    </div>

    <div class="w-full md:w-1/2 p-8">
        <div class="flex justify-center mb-6">
            <img alt="Company Logo" height="50" src="{{ asset('images/radnet-logo.png') }}" width="100"/>
        </div>
        <h2 class="text-3xl font-bold mb-2 text-center md:text-left">Get Started</h2>
        <p class="text-gray-600 mb-6 text-center md:text-left">Create your account now</p>

        <form method="POST" action="">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="full-name">Full Name</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="full-name" name="name" placeholder="Enter your full name" type="text"/>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" name="email" placeholder="example@gmail.com" type="email"/>
            </div>
            <div class="mb-6 relative">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" name="password" placeholder="Enter your password" type="password"/>
            </div>
            <div class="flex items-center justify-between">
                <button class="w-full bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Sign Up
                </button>
            </div>
        </form>

        <p class="mt-6 text-center text-gray-600">
            Have an account?
            <a class="text-orange-500" href="">Login</a>
        </p>
    </div>
</div>
@endsection
