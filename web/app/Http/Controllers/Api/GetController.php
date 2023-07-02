<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke()
    {
        return [
            'data'=> '123'
        ];
    }
}
