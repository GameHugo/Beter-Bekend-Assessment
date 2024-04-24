<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('project.index', [
            'projects' => Auth::user()->projects()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        Auth::user()->projects()->create($request->validated());

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        if (Auth::user()->id === $project->user_id) {
            return view('project.show', [
                'project' => $project,
                'logs' => $project->logs()->get()->sortByDesc('created_at'),
                'totalTime' => $project->getTotalTime(),
            ]);
        }
        return redirect()->route('projects.index')->with('error', 'You are not authorized to view this project');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        if (Auth::user()->id === $project->user_id) {
            return view('project.create', [
                'project' => $project,
            ]);
        }
        return redirect()->route('projects.index')->with('error', 'You are not authorized to edit this project');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        if (Auth::user()->id === $project->user_id) {
            $project->update($request->validated());
            return redirect()->route('projects.index')->with('success', 'Project updated successfully');
        }
        return redirect()->route('projects.index')->with('error', 'You are not authorized to update this project');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (Auth::user()->id === $project->user_id) {
            if ($project->logs()->count() > 0) {
                return redirect()->route('projects.index')->with('error', 'Project has logs, please delete them first');
            }
            $project->delete();
            return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
        }
        return redirect()->route('projects.index')->with('error', 'You are not authorized to delete this project');
    }
}
