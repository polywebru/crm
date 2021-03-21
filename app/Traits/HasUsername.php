<?php

namespace App\Traits;

trait HasUsername
{
    public function getUsernameFromEmail($email): string
    {
        $username = explode('@', $email);

        return $username[0];
    }
}
