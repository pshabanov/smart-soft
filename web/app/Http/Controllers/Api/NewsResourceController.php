<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NewsStoreRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Response;

class NewsResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NewsResource::collection(News::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('files'))
        {
            $path = $request->file('files')->store('images/news', 'public');
            $data['image'] = url('storage/'.$path);
            unset($data['files']);
        }
        return News::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return new NewsResource($news);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsStoreRequest $request, News $news)
    {
        $news->update($request->validated());

        return new NewsResource($news);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
