<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Review;

class IndexController extends Controller
{
    public function index()
    {
        $news = News::query()->orderBy("created_at", 'desc')->limit(3)->get();
        $reviews = Review::query()->orderBy("created_at", 'desc')->get();
        return view('home', [
            'news' => $news,
            'reviews' => $reviews
        ]);
    }
}
