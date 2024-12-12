<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.project_list',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return view('project.add_project',compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $projectRequest)
    {
        $validate = $projectRequest->validated();
        $projectData = collect($validate)->except('skills')->toArray();
        $project = Project::create($projectData);
        $project->skills()->sync($validate['skills']);

        return redirect()->route('project.index')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Skill $skill)
    {
        $skills = Skill::all();
        return view('project.update_project',compact('project','skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $validate = $request->validated();
        $projectData = collect($validate)->except('skills')->toArray();
        $project->update($projectData);
        $project->skills()->sync($validate['skills']);


        return redirect()->route('project.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->skills()->detach();
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully');
    }
}
