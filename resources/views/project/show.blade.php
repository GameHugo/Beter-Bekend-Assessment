@extends('dashboard.layout')

@section('title', 'Projects')

@section('content')
    <div class="w-full flex justify-center">
        <div class="flex flex-col items-center mt-16 w-full">
            <h1 class="text-2xl font-bold">Project {{ $project->name }}</h1>
            @if(session('success'))
                <p class="mt-4 bg-green-200 text-green-800 p-4">{{ session('success') }}</p>
            @endif
            @if(session('error'))
                <p class="mt-4 bg-red-200 text-red-800 p-4">{{ session('error') }}</p>
            @endif
            <form action="{{ route('projects.logs.store', $project) }}" method="post">
                @csrf
                <div class="bg-white shadow-md p-4 mt-4 flex flex-col gap-2 justify-between items-center w-full">
                    <div>
                        <p class="text-xl font-bold">Create log</p>
                        <input type="text" name="name" placeholder="Name" class="mt-4 p-2 w-full border border-gray-300 rounded-md">
                        <input type="number" name="minutes" placeholder="Minutes" class="mt-4 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                    <button type="submit" class="block bg-blue-500 hover:bg-blue-600 transition text-white p-3 rounded-md">
                        Create log
                    </button>
                </div>
            </form>
            <div class="w-full flex justify-center mt-4">
                <div class="w-1/3 bg-white shadow-md p-4 mt-4 flex justify-between items-center">
                    <div>
                        <p class="text-xl font-bold">Total time</p>
                        <p class="mt-4">{{ $totalTime }} minutes</p>
                    </div>
                </div>
            </div>
            @foreach($logs as $log)
                <div class="w-1/3 bg-white shadow-md p-4 mt-4 flex justify-between items-center">
                    <div>
                        <p class="text-xl font-bold">{{ $log->name }}</p>
                        <p class="mt-4">{{ $log->minutes }} minutes</p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('projects.logs.edit', [$project, $log]) }}"
                           class="bg-blue-500 hover:bg-blue-600 transition text-white p-3 rounded-md">
                            Edit log
                        </a>
                        <form action="{{ route('projects.logs.destroy', [$project, $log]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="block bg-red-500 hover:bg-red-600 transition text-white p-3 rounded-md">
                                Delete log
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
