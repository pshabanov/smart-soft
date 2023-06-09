<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        return $request->expectsJson() ? ['details'=>'Вы не авторизованы или токен просрочен'] : route('login');
    }
}
