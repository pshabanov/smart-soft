<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::query()->orderBy("created_at", 'desc')->simplePaginate(3);
        return view('pages.news.index',[
            'news' => $news
        ]);
    }

    public function detail($id){
        $news = News::query()->findOrFail($id);
        return view('pages.news.detail_news',[
            'news'=>$news
        ]);
    }
}
