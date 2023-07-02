<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadImageContoller extends Controller
{
    public function index(Request $request){
        $path = '';
        if ($request->hasFile('files'))
        {
            $path  = $request->file('files')->store('images/'.$request->path, 'public');
        }
        return $path;
    }
}
