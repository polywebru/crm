<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    private array $userPermissions = [
        'view user profile',
    ];

    private array $adminPermissions = [
        'manage users',
    ];

    public function run()
    {
        $userPermissions = $this->setUserPermissions();
        $adminPermissions = $this->setAdminPermissions($userPermissions);

        $user = Role::firstOrCreate(['name' => \App\Models\Role::USER_ROLE]);
        $admin = Role::firstOrCreate(['name' => \App\Models\Role::ADMIN_ROLE]);

        $user->syncPermissions($userPermissions);
        $admin->syncPermissions($adminPermissions);
    }

    private function setUserPermissions(): array
    {
        $permissions = [];

        foreach ($this->userPermissions as $userPermission) {
            $permissions[] = Permission::firstOrCreate(['name' => $userPermission]);
        }

        return $permissions;
    }

    private function setAdminPermissions(array $userPermissions): array
    {
        $permissions = $userPermissions;

        foreach ($this->adminPermissions as $adminPermission) {
            $permissions[] = Permission::firstOrCreate(['name' => $adminPermission]);
        }

        return $permissions;
    }
}
