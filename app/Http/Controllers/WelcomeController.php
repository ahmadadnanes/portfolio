<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index(){
        $projects = Project::with('skills')->get();
        $projects->each(function($project){
            $project->image = asset('storage/'. $project->image);
        });

        $skills = Skill::all();
        $skills->each(function($skill){
            $skill->icon = asset('storage/'. $skill->icon);
        });

        return Inertia::render('Welcome' , ["skills" => $skills , "projects" => $projects]);
    }
}
