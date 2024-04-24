@extends('dashboard.layout')

@section('title', 'Projects')

@section('content')
    <div class="w-full flex justify-center">
        <div class="flex flex-col items-center mt-16 w-full">
            <h1 class="text-2xl font-bold">Edit Log</h1>
            <form action="{{ route('projects.logs.update', [$project, $log]) }}" method="post"
                  class="mt-4 w-1/2 flex flex-col items-center">
                @method('PUT')
                @csrf
                <div>
                    <input type="text" name="name" id="name" value="{{ $log->name }}"
                           required placeholder="Name" class="mt-4 p-2 w-full border border-gray-300 rounded-md">
                </div>
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div>
                    <input type="number" name="minutes" id="minutes" value="{{ $log->minutes }}"
                           required placeholder="Minutes" class="mt-4 p-2 w-full border border-gray-300 rounded-md">
                </div>
                @error('minutes')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <button type="submit" class="mt-4 bg-blue-500 text-white p-4 rounded-md">Edit log</button>
            </form>
        </div>
    </div>
@endsection
