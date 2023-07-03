<?php

namespace App\Http\Controllers;

use App\Models\Certificate;

class CertificatesController extends Controller
{
    public function index()
    {
        $certificates = Certificate::query()->orderBy("created_at", 'desc')->get();
        return view('pages.certificates.certificates', [
            'certificates' => $certificates
        ]);
    }
}
