<?php

namespace Tests\Feature\Api\User;

use App\Models\Faculty;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndex()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('api/v1/user');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
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
                'skills',
                'links',
                'speciality',
                'faculty',
                'study_begin_date',
                'study_duration',
                'email_verified_at',
                'last_sign_in_at',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testUpdateMainInfo()
    {
        $user = User::factory()->create();
        $data = [
            'username' => 'test',
            'last_name' => 'Ivanov',
            'first_name' => 'Alexey',
            'middle_name' => 'Olegovich',
            'gender' => 'male',
            'date_birth' => '2001-01-01',
        ];

        $response = $this->actingAs($user)->post('api/v1/user/main-info', $data);

        $response->assertStatus(200);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas('users', $data);
    }

    public function testUpdateContactInfo()
    {
        $user = User::factory()->create();
        $data = [
            'email' => 'test@test.ru',
            'phone' => '78005553535',
        ];

        $response = $this->actingAs($user)->post('api/v1/user/contact-info', $data);

        $response->assertStatus(200);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas('users', $data);
    }

    public function testUpdateAdditionalInfo()
    {
        $user = User::factory()->create();
        $speciality = Speciality::factory()->create();
        $data = [
            'speciality_id' => $speciality->id,
            'study_begin_date' => '2016-09-01',
            'study_duration' => User::BAKALAVRIAT_DURATION,
        ];

        $response = $this->actingAs($user)->post('api/v1/user/additional-info', $data);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'study_begin_date' => '2016-09-01',
            'study_duration' => User::BAKALAVRIAT_DURATION,
        ]);
        $this->assertDatabaseHas('users', $data);
    }

    public function testUpdatePassword()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);
        $data = [
            'old_password' => 'password',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ];

        $response = $this->actingAs($user)->post('api/v1/user/password', $data);

        $user->refresh();
        $response->assertStatus(200);
        $this->assertTrue(Hash::check('secret', $user->password));
    }

    public function testLinks()
    {
        $user = User::factory()->create();
        $data = [
            'links' => [
                [
                    'type' => 'vk',
                    'url' => 'https://vk.com/polywebcrm',
                ],
                [
                    'type' => 'fb',
                    'url' => 'https://facebook.com/polywebcrm',
                ],
                [
                    'type' => 'tg',
                    'url' => 'https://tg.me/polywebcrm',
                ],
            ],
        ];

        $response = $this->actingAs($user)->post('api/v1/user/links', $data);

        $response->assertStatus(204);
        foreach ($data['links'] as $link) {
            $this->assertDatabaseHas('links', array_merge($link, ['user_id' => $user->id]));
        }
    }

    public function testSkills()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);
        $data = [
            'skills' => [
                'laravel',
                'php',
                'docker',
            ],
        ];

        $response = $this->actingAs($user)->post('api/v1/user/skills', $data);

        $response->assertStatus(204);
        foreach ($data['skills'] as $skill) {
            $this->assertDatabaseHas('skills', [
                'name' => $skill,
                'user_id' => $user->id,
            ]);
        }
    }
}
