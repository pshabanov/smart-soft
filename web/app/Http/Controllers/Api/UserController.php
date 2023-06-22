<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Models\AdminUser;
use App\Models\User;
use App\Providers\Api\ResponseProvider;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $responseProvider = new ResponseProvider();


        $user = AdminUser::where('username', $request['username'])->first();
        if (is_null($user)) {
            return $responseProvider->FAIL($user, 'Аккаунт не найдет!', 403);
        }
        $admin = AdminUser::where('user_id', $user->id)->first();

        if (is_null($admin)) {
            return $responseProvider->FAIL($admin, 'У вас нет доступа!', 403);
        }

        $auth = $keyCloakProvider->KeyCloakLogin($request);

        if (isset($auth->access_token)) {
            $admin->keycloak_token = $auth->access_token;
            $admin->save();
        } else {
            return $responseProvider->EXCEPTION($auth, 'Не удалось войти! Не верный логин или пароль!', 403);
        }

        $userToken = $user->createToken('WEBDEVSAPI TOKEN')->plainTextToken;

        $role = Role::where('id', $admin->role_id)->first();
        $role->permissions;

        return $responseProvider->SUCCESS([
            'user' => $user, 'token' => $userToken, 'role' => $role
        ], 'Вы успешно вошли в свой аккаунт!');

    }

    public function read(Request $request)
    {
        $responseProvider = new ResponseProvider();

        if ($request->query('size')) $users = User::orderBy('created_at', 'DESC')->paginate($request->query('size'));
        else $users = User::all();

        return $responseProvider->SUCCESS($users, '[OSTORE] - Получен список пользователей');
    }
}
