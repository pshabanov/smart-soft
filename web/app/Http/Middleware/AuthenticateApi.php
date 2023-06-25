<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AuthenticateApi extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        $token = $request->bearerToken();

        if ($token === config('apitokens')[0]) return;
        $this->unauthenticated($request, $guards);
    }
}
