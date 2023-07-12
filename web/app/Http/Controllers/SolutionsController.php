<?php

namespace App\Http\Controllers;

use App\Models\Solution;

class SolutionsController extends Controller
{
    public function index()
    {
        $solutions = Solution::query()->orderBy("created_at", 'desc')->simplePaginate(5);
        return view('pages.solutions.solutions_list', [
            'solutions' => $solutions
        ]);
    }

    public function detail($id)
    {
        $solutions = Solution::query()->findOrFail($id);
        return view('pages.solutions.detail_solutions', [
            'solutions' => $solutions
        ]);
    }
}
