<?php

namespace App\Http\Controllers\Api\User;

use App\Exceptions\ForbiddenException;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController extends Controller
{
    public function index(User $user)
    {
        if (Auth::user()->can('view user profile')) {
            $user = $user->load('skills', 'links', 'speciality', 'speciality.faculty');

            return new UserResource($user);
        } else {
            throw new ForbiddenException();
        }
    }

    public function avatar(User $user)
    {
        if ($user->avatar) {
            return response()->file($user->avatar->filepath);
        } else {
            throw new NotFoundHttpException();
        }
    }
}
