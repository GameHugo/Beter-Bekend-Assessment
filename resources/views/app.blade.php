@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="w-full flex flex-col items-center mt-16">
        <h1 class="text-2xl font-bold">Beter Bekend Assessment</h1>
        <div class="w-full flex gap-5 justify-center mt-4">
            @auth()
                <a href="{{ route('dashboard') }}" class="block bg-blue-500 hover:bg-blue-600 transition text-white p-3 rounded-md mt-4">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="block bg-blue-500 hover:bg-blue-600 transition text-white p-3 rounded-md mt-4">
                    Login
                </a>
                <a href="{{ route('register') }}" class="block bg-blue-500 hover:bg-blue-600 transition text-white p-3 rounded-md mt-4">
                    Register
                </a>
            @endauth
        </div>
    </div>

@endsection
