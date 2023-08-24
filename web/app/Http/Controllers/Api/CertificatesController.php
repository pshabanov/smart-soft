<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CertificateStoreRequest;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use Illuminate\Http\Response;

class CertificatesController extends Controller
{
    public function index()
    {
        return CertificateResource::collection(Certificate::orderBy('position', 'DESC')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateStoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('files')) {
            $path = $request->file('files')->store('images/certificates', 'public');
            $data['image'] = url('storage/' . $path);
            unset($data['files']);
        }

        return Certificate::query()->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return new CertificateResource($certificate);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificateStoreRequest $request, Certificate $certificate)
    {
        $certificate->update($request->validated());

        return new CertificateResource($certificate);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
