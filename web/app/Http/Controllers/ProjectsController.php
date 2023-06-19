<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::query()->orderBy("created_at", 'desc')->simplePaginate(5);
        return view('pages.projects.projects_list',[
            'projects' => $projects
        ]);
    }

    public function detail($id){
        $projects = Project::query()->findOrFail($id);
        return view('pages.projects.detail_projects',[
            'projects'=>$projects
        ]);
    }
}
