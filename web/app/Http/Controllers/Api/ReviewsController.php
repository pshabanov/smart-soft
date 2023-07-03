<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReviewsStoreRequest;
use App\Http\Resources\ReviewsResource;
use App\Models\Review;
use Illuminate\Http\Response;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ReviewsResource::collection(Review::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewsStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('files')) {
            $path = $request->file('files')->store('images/review', 'public');
            $data['image'] = url('storage/' . $path);
            unset($data['files']);
        }
        return Review::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return new ReviewsResource($review);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewsStoreRequest $request, Review $review)
    {
        $review->update($request->validated());

        return new ReviewsResource($review);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
