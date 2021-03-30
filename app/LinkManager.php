<?php

namespace App;

use App\Models\Link;
use App\Models\User;

class LinkManager
{
    private ?Link $link;

    public function __construct(Link $link = null)
    {
        $this->link = $link;
    }

    public function create(array $params, User $user): Link
    {
        $this->link = app(Link::class);
        $this->link->fill($params);
        $this->link->user()->associate($user);
        $this->link->save();

        return $this->link;
    }
}
