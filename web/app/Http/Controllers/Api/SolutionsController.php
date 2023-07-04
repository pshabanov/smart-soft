<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SolutionsStoreRequest;
use App\Http\Resources\SolutionsResource;
use App\Models\Solution;
use Illuminate\Http\Response;

class SolutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SolutionsResource::collection(Solution::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SolutionsStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('files')) {
            $path = $request->file('files')->store('images/services', 'public');
            $data['image'] = url('storage/' . $path);
            unset($data['files']);
        }

        return Solution::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Solution $solution)
    {
        return new SolutionsResource($solution);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SolutionsStoreRequest $request, Solution $solution)
    {
        $solution->update($request->validated());

        return new SolutionsResource($solution);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solution $solution)
    {
        $solution->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
