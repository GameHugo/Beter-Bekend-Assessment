@extends('layout')

@section('title', 'Login')

@section('content')
    <div class="w-full flex justify-center">
        <div class="flex flex-col items-center mt-16 w-1/4">
            <h1 class="text-2xl font-bold">Login</h1>
            <form action="{{ route('login') }}" method="post" class="flex flex-col items-center mt-4 w-2/3">
                @csrf
                <div class="w-full flex items-center justify-center gap-2">
                    <input class="mt-4 p-2 w-full border border-gray-300 rounded-md"
                           type="email" id="email" name="email" placeholder="Email" required>
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <div class="w-full flex items-center justify-center gap-2">
                    <input class="mt-4 p-2 w-full border border-gray-300 rounded-md"
                           type="password" id="password" name="password" placeholder="Password" required>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <button class="bg-blue-500 hover:bg-blue-600 transition text-white rounded-md p-1 w-48 mt-4"
                        type="submit">Login</button>
            </form>
            <a href="{{ route('register') }}" class="mt-4 hover:underline">Nog geen account?</a>
        </div>
    </div>
@endsection
