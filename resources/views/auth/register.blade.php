@extends('layout')

@section('title', 'Register')

@section('content')
    <div class="w-full flex justify-center">
        <div class="flex flex-col items-center mt-16">
            <h1 class="text-2xl font-bold">Register</h1>
            <form action="{{ route('register') }}" method="post" class="flex flex-col items-center mt-4">
                @csrf
                <div class="w-full flex items-center justify-center gap-2">
                    <label for="name">Name</label>
                    <input class="border border-gray-300 rounded-md p-1 w-full"
                           type="text" id="name" name="name" required>
                </div>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <div class="w-full flex items-center mt-2 justify-center gap-2">
                    <label for="email">Email</label>
                    <input class="border border-gray-300 rounded-md p-1 w-full"
                           type="email" id="email" name="email" required>
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <div class="w-full flex items-center mt-2 justify-center gap-2">
                    <label for="password">Password</label>
                    <input class="border border-gray-300 rounded-md p-1 w-full"
                           type="password" id="password" name="password" required>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <div class="w-full flex items-center mt-2 justify-center gap-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="border border-gray-300 rounded-md p-1 w-full"
                           type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button class="bg-blue-500 hover:bg-blue-600 transition text-white rounded-md p-1 w-48 mt-4"
                        type="submit">Register</button>
            </form>
            <a href="{{ route('login') }}" class="mt-4 hover:underline">Al een account?</a>
        </div>
    </div>
@endsection
