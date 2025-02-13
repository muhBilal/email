@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="bg-white rounded-lg shadow-lg flex flex-col md:flex-row max-w-4xl w-full">
    
    <div class="hidden md:flex md:w-1/2 bg-orange-500 rounded-l-lg p-8 items-center justify-center relative">
        <img alt="Two women, one holding a megaphone, standing in front of an orange background with building silhouettes"
            class="absolute inset-0 w-full h-full object-cover rounded-l-lg"
            height="800" src="{{ asset('images/auth.webp') }}" width="600"/>
    </div>

    <div class="w-full md:w-1/2 p-8">
        <div class="flex justify-center mb-6">
            <img alt="Company Logo" height="50" src="{{ asset('images/radnet-logo.webp') }}" width="100"/>
        </div>
        <h2 class="text-3xl font-bold mb-2 text-center md:text-left">Forgot Password</h2>
        <p class="text-gray-600 mb-6 text-center md:text-left">Enter your email to receive password reset instructions</p>
        <form>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" placeholder="example@gmail.com" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500"/>
            </div>
            <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition duration-200">Send Reset Link</button>
        </form>
        <p class="text-center text-gray-500 mt-6">Remembered your password? <a href="#" class="text-orange-500">Login</a></p>
    </div>
</div>
@endsection
