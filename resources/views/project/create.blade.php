@extends('dashboard.layout')

@section('title', 'Projects')

@section('content')
    <div class="w-full flex justify-center">
        <div class="flex flex-col items-center mt-16 w-full">
            @if(isset($project))
                <h1 class="text-2xl font-bold">Edit project</h1>
                <form action="{{ route('projects.update', $project) }}" method="post" class="mt-4 w-1/2 flex flex-col items-center">
                @method('PUT')
            @else
                <h1 class="text-2xl font-bold">Create project</h1>
                <form action="{{ route('projects.store') }}" method="post" class="mt-4 w-1/2 flex flex-col items-center">
            @endif
                @csrf
                <div>
                    <input type="text" name="name" id="name" @if(isset($project)) value="{{ $project->name }}" @endif
                        required placeholder="Name" class="mt-4 p-2 w-full border border-gray-300 rounded-md">
                </div>
                    @if(isset($project))
                        <button type="submit" class="mt-4 bg-blue-500 text-white p-4 rounded-md">Edit project</button>
                    @else
                        <button type="submit" class="mt-4 bg-blue-500 text-white p-4 rounded-md">Create project</button>
                    @endif
            </form>
        </div>
    </div>
@endsection
