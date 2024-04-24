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

    Route::resource('projects', ProjectController::class)
        ->name('index', 'projects.index')
        ->name('show', 'projects.show')
        ->name('create', 'projects.create');

    Route::resource('projects.logs', LogController::class)
        ->name('index', 'projects.logs.index')
        ->name('show', 'projects.logs.show')
        ->name('update', 'projects.logs.update')
        ->name('create', 'projects.logs.create');

    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');
});
