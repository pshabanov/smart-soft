<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        return view('pages.projects.projects');
    }

    public function detail(){
        return view('pages.projects.detail_projects');
    }
}
