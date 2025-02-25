<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        $projects->each(function ($project) {
            $project->image = asset('storage/' . $project->image);
        });

        return Inertia::render('Projects/Index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Projects/Create' , ["skills" => Skill::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_url' => 'required',
            'skills' => 'required|exists:skills,id'
        ]);

        $attributes['image'] = $request->file('image')->store('project-images' , 'public');

        $project = Project::create(Arr::except($attributes , 'skills'));

        $project->skills()->attach($attributes['skills']);

        return Redirect::route('projects.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $project->load("skills");
        return Inertia::render("Projects/Edit" , ["project" => $project , "skills" => Skill::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            "name" => ["required", "string"],
        ]);

        $image = $project->image;

        if($request->get('image')) {

            $request->validate([
                "image" => [ "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"]
            ]);

            Storage::delete($project->image);
            $request->file('image')->store('project-images' , 'public');
        }

        if($request->has('skills')){
            $project->skills()->detach();
            $project->skills()->attach($request->skills);
        }


        $project->update([
            "name" => $request->get("name"),
            "image" => $image
        ]);

        //test

        return redirect('/projects')->with('success', 'Project updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();
        return redirect()->route('projects.index');
    }
}
