<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\PermissionResource;
use App\Http\Resources\User\RoleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RolesAndPermissionsController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        return new JsonResponse([
            'roles' => RoleResource::collection($user->roles),
            'permissions' => PermissionResource::collection($user->getAllPermissions()),
        ]);
    }
}
