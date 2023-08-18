<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\News;
use App\Models\Review;

class IndexController extends Controller
{
    public function index()
    {
        $news = News::query()->where('active', 1)->orderBy("created_at", 'desc')->limit(3)->get();
        $reviews = Review::query()->where('active', 1)->orderBy("created_at", 'desc')->get();
        $banners = Banner::query()->where('active', 1)->orderBy("position", 'asc')->get();
        return view('home', [
            'news' => $news,
            'reviews' => $reviews,
            'banners' => $banners
        ]);
    }

    public function certificates(){
        return view('pages.certificates');
    }
}
