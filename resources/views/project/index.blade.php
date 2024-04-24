@extends('dashboard.layout')

@section('title', 'Projects')

@section('content')
    <div class="w-full flex justify-center">
        <div class="flex flex-col items-center mt-16 w-full">
            <h1 class="text-2xl font-bold">Projects</h1>
            @if(session('success'))
                <p class="mt-4 bg-green-200 text-green-800 p-4">{{ session('success') }}</p>
            @endif
            @if(session('error'))
                <p class="mt-4 bg-red-200 text-red-800 p-4">{{ session('error') }}</p>
            @endif
            @if($projects->isEmpty())
                <p class="mt-4 bg-red-200 text-red-800 p-4">No projects found</p>
            @endif
            @foreach($projects as $project)
                <div class="w-1/3 bg-white shadow-md p-4 mt-4 flex justify-between items-center">
                    <div>
                        <a href="{{ route('projects.show', $project) }}"
                           class="text-xl font-bold">{{ $project->name }}</a>
                        <a href="{{ route('projects.edit', $project) }}"
                            class="mt-4 block">Edit project</a>
                    </div>
                    <form action="{{ route('projects.destroy', $project) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="block bg-red-500 hover:bg-red-600 transition text-white p-3 rounded-md">
                            Delete project
                        </button>
                    </form>
                </div>
            @endforeach

            <a href="{{ route('projects.create') }}"
               class="mt-4 block bg-blue-500 hover:bg-blue-600 transition text-white p-4 rounded-md">
                Create project
            </a>
        </div>
    </div>
@endsection
