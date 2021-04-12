<?php

namespace Tests\Integration;

use App\LinkManager;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LinkManagerTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {
        $user = User::factory()->create();
        $params = [
            'type' => 'vk',
            'url' => 'https://vk.com/polywebcrm',
        ];

        app(LinkManager::class)->create($params, $user);

        $this->assertDatabaseHas('links', [
            'type' => 'vk',
            'url' => 'https://vk.com/polywebcrm',
            'user_id' => $user->id,
        ]);
    }
}
