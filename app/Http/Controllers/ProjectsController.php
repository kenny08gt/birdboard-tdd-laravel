<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::all();
        return view("projects.index", compact("projects"));
    }

    public function store()
    {
        //validate
        request()->validate([
            "title" => "required",
            "description" => "required",
        ]);

        //persist
        \App\Models\Project::create(request(["title", "description"]));

        //redirect
        return redirect("/projects");
    }

    public function show(Project $project)
    {
        return view("projects.show", compact("project"));
    }
}
