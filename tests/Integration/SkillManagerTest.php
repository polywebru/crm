<?php

namespace Tests\Integration;

use App\Models\User;
use App\SkillManager;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SkillManagerTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {
        $user = User::factory()->create();
        $params = [
            'name' => 'laravel',
        ];

        app(SkillManager::class)->create($params, $user);

        $this->assertDatabaseHas('skills', [
            'name' => 'laravel',
            'user_id' => $user->id,
        ]);
    }
}
