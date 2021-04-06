<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatusRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Traits\HasDatatableFilters;
use App\UserManager;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    use HasDatatableFilters;

    public function index()
    {
        $builder = User::with('roles');

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

    public function delete(User $user)
    {
        app(UserManager::class, ['user' => $user])->delete();

        return new JsonResponse([
            'message' => 'Пользователь успешно удалён',
        ], 200);
    }
}
