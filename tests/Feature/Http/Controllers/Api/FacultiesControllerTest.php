<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FacultiesControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testInvoke()
    {
        $user = User::factory()->create();
        $faculties = Faculty::factory()->count(5)->create();

        $response = $this->actingAs($user)->get('api/v1/faculties');

        $response->assertStatus(200);
        foreach ($faculties as $faculty) {
            $response->assertJsonFragment([
                'id' => $faculty->id,
                'name' => $faculty->name,
            ]);
        }
    }
}
