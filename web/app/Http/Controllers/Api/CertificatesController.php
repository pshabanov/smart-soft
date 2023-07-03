<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CertificatesStoreRequest;
use App\Http\Resources\CertificatesResource;
use App\Models\Certificate;
use Illuminate\Http\Response;

class CertificatesController extends Controller
{
    public function index()
    {
        return CertificatesResource::collection(Certificate::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificatesStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('files')) {
            $path = $request->file('files')->store('images/banners', 'public');
            $data['image'] = url('storage/' . $path);
            unset($data['files']);
        }

        return Certificate::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $banner)
    {
        return new CertificatesResource($banner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificatesStoreRequest $request, Certificate $banner)
    {
        $banner->update($request->validated());

        return new CertificatesResource($banner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $banner)
    {
        $banner->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
