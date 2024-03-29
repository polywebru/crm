<?php

namespace App\Traits;

use App\Models\User;

trait HasUsername
{
    public function getUsernameFromEmail($email): string
    {
        $username = explode('@', $email)[0];

        if (User::where('username', $username)->first()) {
            $num = 2;

            while (User::where('username', $username . $num)->first()) {
                $num++;
            }

            $username .= $num;
        }

        return $username;
    }
}
