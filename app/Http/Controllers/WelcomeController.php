<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index(){
        $project = Project::with('skills')->get();
        return Inertia::render('Welcome' , ["skills" => Skill::all() , "projects" => $project]);
    }
}
