<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;
use App\Models\Project;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Project $project, StoreLogRequest $request)
    {
        if ($project->user_id === auth()->id()) {
            $project->logs()->create($request->validated());
            return redirect()->route('projects.show', $project)->with('success', 'Log created successfully');
        }
        return redirect()->route('projects.index')->with('error', 'You are not authorized to create a log for this project');
    }

    /**
     * Display the specified resource.
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Log $log)
    {
        if ($project->user_id === auth()->id()) {
            return view('log.edit', [
                'project' => $project,
                'log' => $log,
            ]);
        }
        return redirect()->route('projects.index')->with('error', 'You are not authorized to edit this log');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Project $project, UpdateLogRequest $request, Log $log)
    {
        if ($project->user_id === auth()->id()) {
            $log->update($request->validated());
            return redirect()->route('projects.show', $project)->with('success', 'Log updated successfully');
        }
        return redirect()->route('projects.index')->with('error', 'You are not authorized to update this log');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Log $log)
    {
        if ($project->user_id === auth()->id()) {
            $log->delete();
            return redirect()->route('projects.show', $project)->with('success', 'Log deleted successfully');
        }
        return redirect()->route('projects.index')->with('error', 'You are not authorized to delete this log');
    }

    /**
     * Remove all logs from storage.
     */
    public function destroyAll(Project $project)
    {
        if ($project->user_id === auth()->id()) {
            $project->logs()->delete();
            return redirect()->route('projects.show', $project)->with('success', 'All logs deleted successfully');
        }
        return redirect()->route('projects.index')->with('error', 'You are not authorized to delete all logs');
    }
}
