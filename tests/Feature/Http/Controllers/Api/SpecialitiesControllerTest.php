<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Faculty;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SpecialitiesControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testInvoke()
    {
        $user = User::factory()->create();
        $specialities = Speciality::factory()->count(5)->create();

        $response = $this->actingAs($user)->get('api/v1/specialities');

        $response->assertStatus(200);
        foreach ($specialities as $speciality) {
            $response->assertJsonFragment([
                'id' => $speciality->id,
                'code' => $speciality->code,
                'name' => $speciality->name,
                'profile' => $speciality->profile,
            ]);
        }
    }

    public function testGetSpecialitiesByFacultyId()
    {
        $user = User::factory()->create();
        $faculty = Faculty::factory()->create();
        $specialities = Speciality::factory()->count(5)->create(['faculty_id' => $faculty->id]);

        $response = $this->actingAs($user)->get("api/v1/faculties/{$faculty->id}/specialities");

        $response->assertStatus(200);
        foreach ($specialities as $speciality) {
            $response->assertJsonFragment([
                'id' => $speciality->id,
                'code' => $speciality->code,
                'name' => $speciality->name,
                'profile' => $speciality->profile,
            ]);
        }
    }
}
