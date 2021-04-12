<?php

namespace Tests\Integration;

use App\LinksManager;
use App\Models\Link;
use App\Models\Skill;
use App\Models\User;
use App\SkillsManager;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SkillsManagerTest extends TestCase
{
    use DatabaseTransactions;

    public function testSetUserSkills()
    {
        $user = User::factory()->create();
        $skills = [
            'laravel',
            'php',
            'docker'
        ];

        app(SkillsManager::class)->setUserSkills($skills, $user);

        foreach ($skills as $skill) {
            $this->assertDatabaseHas('skills', [
                'name' => $skill,
                'user_id' => $user->id,
            ]);
        }
    }

    public function testDeleteUserSkills()
    {
        $user = User::factory()->create();
        $skills = [
            [
                'name' => 'laravel',
            ],
            [
                'name' => 'php',
            ],
            [
                'name' => 'docker'
            ],
        ];
        foreach ($skills as $skill) {
            Skill::factory()->create(array_merge($skill, ['user_id' => $user->id]));
        }

        app(SkillsManager::class)->deleteUserSkills($user);

        foreach ($skills as $skill) {
            $this->assertDatabaseMissing('skills', array_merge($skill, ['user_id' => $user->id]));
        }
    }
}
