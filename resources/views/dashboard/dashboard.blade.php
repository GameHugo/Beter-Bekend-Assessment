@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="w-full flex justify-center">
        <div class="flex flex-col items-center mt-16 w-2/3">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <div class="w-full flex flex-wrap justify-center mt-4 gap-5">
                <div class="w-1/3 bg-white shadow-md p-4 mt-4 flex justify-between items-center">
                    <div>
                        <p class="text-xl font-bold">Total projects</p>
                        <p class="mt-4">{{ $totalProjects }}</p>
                    </div>
                </div>
                <div class="w-1/3 bg-white shadow-md p-4 mt-4 flex justify-between items-center">
                    <div>
                        <p class="text-xl font-bold">Total logs</p>
                        <p class="mt-4">{{ $totalLogs }}</p>
                    </div>
                </div>
                <div class="w-1/3 bg-white shadow-md p-4 mt-4 flex justify-between items-center">
                    <div>
                        <p class="text-xl font-bold">Total time</p>
                        <p class="mt-4">{{ $totalTime }} minutes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
