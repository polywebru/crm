<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LogoutControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testInvoke()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'jwt')->post('logout');

        $response->assertStatus(204);
    }
}
