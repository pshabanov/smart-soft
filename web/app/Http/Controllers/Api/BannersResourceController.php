<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BannersStoreRequest;
use App\Http\Resources\BannersResource;
use App\Models\Banners;
use Illuminate\Http\Response;

class BannersResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BannersResource::collection(Banners::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannersStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('files'))
        {
            $path = $request->file('files')->store('images/banners', 'public');
            $data['image'] = url('storage/'.$path);
            unset($data['files']);
        }
        return Banners::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new BannersResource(Banners::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannersStoreRequest $request, Banners $banners)
    {
        $banners->update($request->validated());

        return new BannersResource($banners);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banners $banners)
    {
        $banners->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
