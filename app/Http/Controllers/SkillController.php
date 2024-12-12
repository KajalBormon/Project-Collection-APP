<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skill.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skill.create_skill');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $skillRequest)
    {
        $validate = $skillRequest->validated();
        Skill::create($validate);
        return redirect()->route('skill.index')->with('success', 'Skill added successfully');
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
    public function edit(Skill $skill)
    {
        return view('skill.edit_skill',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillRequest $skillRequest, Skill $skill)
    {
        $validate = $skillRequest->validated();
        $skill->update($validate);
        return redirect()->route('skill.index')->with('success', 'Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->back()->with('success', 'Skill deleted successfully');
    }
}
