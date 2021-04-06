<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsController extends Controller
{
    public function roles()
    {
        return Role::all();
    }

    public function permissions()
    {
        return Permission::all();
    }

    public function permissionsByRole(Role $role)
    {
        return $role->getAllPermissions();
    }
}
