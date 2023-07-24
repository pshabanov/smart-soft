<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BannersStoreRequest;
use App\Http\Resources\BannersResource;
use App\Models\Banner;
use Illuminate\Http\Response;

class BannersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BannersResource::collection(Banner::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannersStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('files')) {
            $path = $request->file('files')->store('images/banners', 'public');
            $data['image'] = url('storage/' . $path);
            unset($data['files']);
        }

        return Banner::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return new BannersResource($banner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannersStoreRequest $request, Banner $banner)
    {
        $banner->update($request->validated());

        return new BannersResource($banner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
