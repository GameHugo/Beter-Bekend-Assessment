<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::resource('projects', ProjectController::class);

    Route::resource('projects.logs', LogController::class)
        ->except(['index', 'create', 'show']);
    Route::delete('/projects/{project}/logs', [LogController::class, 'destroyAll'])
        ->name('projects.logs.destroyAll');

    Route::get('/dashboard', function () {
        $totalLogs = 0;
        $totalTime = 0;
        $totalTimeHours = 0;
        foreach (Auth::user()->projects as $project) {
            $totalLogs += $project->logs()->count();
            $totalTime += $project->getTotalTime();
        }
        if ($totalTime >= 60) {
            $totalTimeHours = floor($totalTime / 60);
            $totalTime = $totalTime % 60;
        }
        $logs = Auth::user()->logs()->orderBy('created_at', 'desc')->limit(5)->get();
        return view('dashboard.dashboard', [
            'totalProjects' => Auth::user()->projects()->count(),
            'totalLogs' => $totalLogs,
            'totalTime' => $totalTime,
            'totalTimeHours' => $totalTimeHours,
            'logs' => $logs,
        ]);
    })->name('dashboard');
});
