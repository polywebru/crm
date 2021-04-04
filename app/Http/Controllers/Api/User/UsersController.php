<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController extends Controller
{
    public function avatar(User $user)
    {
        if ($user->avatar) {
            return response()->file($user->avatar->filepath);
        } else {
            throw new NotFoundHttpException();
        }
    }
}
