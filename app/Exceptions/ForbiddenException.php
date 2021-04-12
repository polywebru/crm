<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class ForbiddenException extends BaseException
{
    public function render()
    {
        return response([
            'success' => false,
            'error' => [
                'code' => Response::HTTP_FORBIDDEN,
                'errors' => 'У вас нет доступа к этому ресурсу.',
            ],
        ], Response::HTTP_FORBIDDEN);
    }
}
