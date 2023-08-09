<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ServicesStoreRequest;
use App\Http\Resources\ServicesResource;
use App\Models\Service;
use Illuminate\Http\Response;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ServicesResource::collection(Service::orderBy('id', 'DESC')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('files')) {
            $path = $request->file('files')->store('images/services', 'public');
            $data['image'] = url('storage/' . $path);
            unset($data['files']);
        }

        return Service::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return new ServicesResource($service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesStoreRequest $request, Service $service)
    {
        $service->update($request->validated());

        return new ServicesResource($service);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
