<?php

namespace Tests\Feature\Api\User;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RolesAndPermissionsControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testInvoke()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('api/v1/user/roles-and-permissions');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'roles' => [],
            'permissions' => [],
        ]);
    }
}
