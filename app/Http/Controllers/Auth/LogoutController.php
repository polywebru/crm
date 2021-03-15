<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\UserManager;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        $userManager = app(UserManager::class, ['user' => Auth::user()]);
        $userManager->logout();

        return response()->noContent();
    }
}
