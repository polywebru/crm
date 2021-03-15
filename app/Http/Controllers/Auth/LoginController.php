<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\UserManager;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        $userManager = app(UserManager::class);
        $token = $userManager->auth($email, $password, $remember);
        $userManager->updateLastSignInAt(now());

        return new JsonResponse([], 204, [
            'Authorization' => 'Bearer ' . $token,
        ]);
    }
}
