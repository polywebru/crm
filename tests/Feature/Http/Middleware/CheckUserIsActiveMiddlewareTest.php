<?php

namespace Tests\Feature\Http\Middleware;

use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CheckUserIsActiveMiddlewareTest extends TestCase
{
    use DatabaseTransactions;

    public function testInactiveUserRequest()
    {
        $user = User::factory()->create(['is_active' => false]);

        $response = $this->actingAs($user)->get('api/v1/user/');

        $response->assertStatus(403);
    }
}
