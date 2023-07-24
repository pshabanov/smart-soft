<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class SendPhoneController extends Controller
{
    public function index(Request $request){
        return Phone::create(['phone' => $request->get('phone')]);
    }
}
