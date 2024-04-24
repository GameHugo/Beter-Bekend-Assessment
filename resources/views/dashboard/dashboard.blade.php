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
                        <p class="mt-4">@if(isset($totalTimeHours) && $totalTimeHours > 0)
                                {{ $totalTimeHours }} hours and
                            @endif {{ $totalTime }} minutes</p>
                    </div>
                </div>
            </div>
            <h2 class="text-xl font-bold mt-8">Recent logs</h2>
            <div class="w-full mt-4 flex flex-col items-center">
                <table class="w-1/2">
                    <thead>
                    <tr>
                        <th class="border-b-2 border-gray-300">Project</th>
                        <th class="border-b-2 border-gray-300">Name</th>
                        <th class="border-b-2 border-gray-300">Time</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @if(count($logs) === 0)
                        <tr class="border-b border-gray-300">
                            <td class="py-2" colspan="3">No logs found</td>
                        </tr>
                    @endif
                    @foreach($logs as $log)
                        <tr class="border-b border-gray-300">
                            <td class="py-2">{{ $log->project->name }}</td>
                            <td class="py-2">{{ $log->name }}</td>
                            <td class="py-2">{{ $log->minutes }} minutes</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p class="mt-4">Showing {{ count($logs) }} of {{ $totalLogs }} logs</p>
            </div>
        </div>
    </div>
@endsection
