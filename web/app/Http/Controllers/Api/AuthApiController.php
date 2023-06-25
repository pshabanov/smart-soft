<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        if (!$user) return response('Такой пользователь не найден', 404);
        return $user;
    }
    public function login(){
        return 'login route';
    }
}
