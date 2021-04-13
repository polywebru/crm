<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait HasEncryptedEmailWithToken
{
    public function decryptEmail($token): array
    {
        $exploded = explode('.', $token);

        if (count($exploded) !== 2) {
            throw new \Exception('Невозможно расшифровать токен.');
        }

        return [
            'email' => Crypt::decrypt($exploded[0]),
            'token' => $exploded[1],
        ];
    }
}
