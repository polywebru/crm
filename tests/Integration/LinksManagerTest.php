<?php

namespace Tests\Integration;

use App\LinksManager;
use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LinksManagerTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateUserLinks()
    {
        $user = User::factory()->create();
        $links = [
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
        ];

        app(LinksManager::class)->createUserLinks($links, $user);

        foreach ($links as $link) {
            $this->assertDatabaseHas('links', array_merge($link, ['user_id' => $user->id]));
        }
    }

    public function testDeleteUserLinks()
    {
        $user = User::factory()->create();
        $links = [
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
        ];
        foreach ($links as $link) {
            Link::factory()->create(array_merge($link, ['user_id' => $user->id]));
        }

        app(LinksManager::class)->deleteUserLinks($user);

        foreach ($links as $link) {
            $this->assertDatabaseMissing('links', array_merge($link, ['user_id' => $user->id]));
        }
    }
}
