<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\UserManager;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $userManager = app(UserManager::class);
        $userManager->create($request->all());
        $token = $userManager->auth($email, $password);
        $userManager->updateLastSignInAt(now());

        return new JsonResponse([], 201, [
            'Authorization' => 'Bearer ' . $token,
        ]);
    }
}
