<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Providers\Api\KeyCloakProvider;
use App\Providers\Api\ResponseProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $responseProvider = new ResponseProvider();
        $keyCloakProvider = new KeyCloakProvider();
        $id = Auth::guard('api')->id();
        $admin = Admin::where('user_id', $id)->first();
        if (is_null($admin)) {
            return $responseProvider->EXCEPTION(null, 'Токен просрочен');
        }
        $checkToken = $keyCloakProvider->CheckKeyCloakLogin('Bearer ' . $admin->keycloak_token);
        if(!$checkToken) {
            return $responseProvider->EXCEPTION(null, 'KEYCLOAK Токен просрочен');
        }
        if (!Auth::guard('api')->check()) {
            return $responseProvider->EXCEPTION(null, 'Токен просрочен');
        }

        return $next($request);
    }
}
