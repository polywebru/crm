<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionsRequest;
use App\Http\Requests\Admin\StatusRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\Role;
use App\Models\User;
use App\Traits\HasDatatableFilters;
use App\UserManager;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    use HasDatatableFilters;

    public function index()
    {
        $builder = User::with('roles', 'permissions');

        return DataTables::eloquent($builder)
            ->filterColumn(...$this->filterInteger('id'))
            ->setTransformer(function ($item) {
                return UserResource::make($item)->resolve();
            })
            ->make();
    }

    public function activate(User $user)
    {
        $user = app(UserManager::class, ['user' => $user])->activate();

        return new UserResource($user);
    }

    public function deactivate(User $user)
    {
        $user = app(UserManager::class, ['user' => $user])->deactivate();

        return new UserResource($user);
    }

    public function changeStatus(StatusRequest $request, User $user)
    {
        $user = app(UserManager::class, ['user' => $user])->updateStatus($request->status);

        return new UserResource($user);
    }

    public function permissions(PermissionsRequest $request, User $user)
    {
        $roles = [];
        $permissions = [];

        foreach ($request->roles as $roleId) {
            $roles[] = Role::findORFail($roleId);
        }
        foreach ($request->permissions as $permissionId) {
            $permissions[] = Permission::findOrFail($permissionId);
        }

        $user = app(UserManager::class, ['user' => $user])->updateRolesAndPermissions($roles, $permissions);

        return new UserResource($user);
    }

    public function delete(User $user)
    {
        app(UserManager::class, ['user' => $user])->delete();

        return new JsonResponse([
            'message' => 'Пользователь успешно удалён',
        ], 200);
    }
}
