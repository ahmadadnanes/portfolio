<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $skills = Skill::all();

        // Loop through each skill and prepend the asset URL for the icon
        $skills->each(function ($skill) {
            $skill->icon = asset('storage/' . $skill->icon);
        });

        return Inertia::render('Skills/Index', [
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Skills/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            "icon" => ["required", "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
            "name" => ["required", "string"],
        ]);

        $attributes["icon"] = $request->file('icon')->store('icons' , 'public');
        Skill::create($attributes);

        return redirect('/skills')->with('success', 'Skill created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return Inertia::render('Skills/Edit', ["skill" => $skill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {

        $request->validate([
            "name" => ["required", "string"],
        ]);

        $icon = $skill->icon;

        if($request->get('icon')) {

            $request->validate([
                "icon" => [ "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"]
            ]);

            Storage::delete($skill->icon);
            $request->file('icon')->store('icons' , 'public');
        }

        $skill->update([
            "name" => $request->get("name"),
            "icon" => $icon
        ]);

        return redirect('/skills')->with('success', 'Skill updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        Storage::delete($skill->icon);
        $skill->delete();
        return redirect('/skills')->with('success', 'Skill deleted!');
    }
}
