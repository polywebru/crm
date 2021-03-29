<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->checkModelModifiedSince(Auth::user(), $request);

        $user = User::with('skills', 'speciality', 'speciality.faculty')->find(Auth::user()->id);

        return new UserResource($user);
    }
}
