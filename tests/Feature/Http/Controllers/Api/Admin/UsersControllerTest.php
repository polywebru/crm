<?php

namespace Tests\Feature\Http\Controllers\Api\Admin;

use App\Models\Faculty;
use App\Models\Role;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndex()
    {
        $user = User::factory()->create();
        $user->assignRole('admin');

        $response = $this->actingAs($user)->get('api/v1/admin/users');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'draw',
            'recordsTotal',
            'recordsFiltered',
            'data' => [
                [
                    'id',
                    'username',
                    'email',
                    'phone',
                    'last_name',
                    'first_name',
                    'middle_name',
                    'gender',
                    'date_birth',
                    'is_active',
                    'status',
                    'speciality',
                    'faculty',
                    'study_begin_date',
                    'study_duration',
                    'email_verified_at',
                    'last_sign_in_at',
                    'created_at',
                    'updated_at',
                    'roles',
                    'permissions',
                ],
            ],
            'queries',
            'input',
        ]);
    }

    public function testActivate()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $user = User::factory()->create([
            'is_active' => false,
        ]);

        $response = $this->actingAs($admin)->post("api/v1/admin/users/{$user->id}/activate");

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'is_active' => true,
        ]);
    }

    public function testDeactivate()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->post("api/v1/admin/users/{$user->id}/deactivate");

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'is_active' => false,
        ]);
    }

    public function testChangeStatus()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->post("api/v1/admin/users/{$user->id}/change-status", [
            'status' => 'employee',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'status' => 'employee',
        ]);
    }

    public function testPermissionsWithPermissions()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $user = User::factory()->create();
        $userRole = Role::findByName('user');
        $manageUsersPermission = Permission::findByName('manage users');

        $response = $this->actingAs($admin)->post("api/v1/admin/users/{$user->id}/permissions", [
            'roles' => [
                $userRole->id,
            ],
            'permissions' => [
                $manageUsersPermission->id,
            ],
        ]);

        $response->assertStatus(200);
        $user->refresh();
        $this->assertTrue($user->hasRole('user'));
        $this->assertTrue($user->hasPermissionTo('manage users'));
    }

    public function testPermissionsWithRoles()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        $user = User::factory()->create();
        $userRole = Role::findByName('user');
        $adminRole = Role::findByName('admin');

        $response = $this->actingAs($admin)->post("api/v1/admin/users/{$user->id}/permissions", [
            'roles' => [
                $userRole->id,
                $adminRole->id,
            ],
        ]);

        $response->assertStatus(200);
        $user->refresh();
        $this->assertTrue($user->hasRole('user'));
        $this->assertTrue($user->hasRole('admin'));
        $this->assertTrue($user->hasPermissionTo('manage users'));
    }
}
