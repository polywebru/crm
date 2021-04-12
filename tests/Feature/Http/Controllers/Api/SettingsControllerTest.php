<?php

namespace Tests\Feature\Api;

use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SettingsControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testInvoke()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('api/v1/settings');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'user_statuses' => User::STATUSES,
                'user_study_durations' => User::STUDY_DURATIONS,
                'link_types' => Link::TYPES,
            ]
        ]);
    }
}
