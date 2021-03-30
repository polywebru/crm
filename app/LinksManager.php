<?php

namespace App;

use App\Models\Link;
use App\Models\User;

class LinksManager
{
    public function createUserLinks(array $links, User $user)
    {
        $this->deleteUserLinks($user);

        foreach ($links as $link) {
            app(LinkManager::class)->create($link, $user);
        }
    }

    public function deleteUserLinks(User $user)
    {
        $user->links()->each(function (Link $link) {
            $link->delete();
        });
    }
}
