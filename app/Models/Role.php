<?php

namespace App\Models;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    public const USER_ROLE = 'user';
    public const ADMIN_ROLE = 'admin';
}
