<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testInvoke()
    {
        $userData = [
            'email' => 'test@test.ru',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'last_name' => 'TestSurname',
            'first_name' => 'TestName',
        ];

        $response = $this->post('register', $userData);

        $response->assertStatus(201);
        $this->assertTrue($response->headers->has('authorization'));
        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
            'last_name' => $userData['last_name'],
            'first_name' => $userData['first_name'],
        ]);
    }
}
