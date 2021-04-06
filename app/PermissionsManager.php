<?php

namespace App;

use App\Models\User;

class PermissionsManager
{
    public function setRolesToUser(array $roles, User $user): User
    {
        return $user->syncRoles($roles);
    }

    public function setPermissionsToUser(array $permissions, User $user): User
    {
        return $user->syncPermissions($permissions);
    }
}
