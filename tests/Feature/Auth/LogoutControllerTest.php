<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Tests\TestCase;

class LogoutControllerTest extends TestCase
{
    public function testInvoke()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'jwt')->post('logout');

        $response->assertStatus(204);
    }
}
