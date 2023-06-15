<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index(){
        return view('projects.projects');
    }

    public function detail(){
        return view('projects.detail_projects');
    }
}
