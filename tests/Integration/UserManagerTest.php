<?php

namespace Tests\Integration;

use App\Models\User;
use App\UserManager;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserManagerTest extends TestCase
{
    use DatabaseTransactions;

    public function testAuth()
    {
        $user = User::factory()->create();

        app(UserManager::class)->auth($user->email, 'password');

        $this->assertEquals($user->id, Auth::user()->id);
    }

    public function testLogout()
    {
        $user = User::factory()->create();
        auth()->login($user);

        app(UserManager::class)->logout();

        $this->assertNull(Auth::user());
    }

    public function testCreate()
    {
        $userData = [
            'email' => 'test@test.ru',
            'password' => 'secret',
            'last_name' => 'TestSurname',
            'first_name' => 'TestName',
        ];

        app(UserManager::class)->create($userData);

        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
            'last_name' => $userData['last_name'],
            'first_name' => $userData['first_name'],
        ]);
    }
}
