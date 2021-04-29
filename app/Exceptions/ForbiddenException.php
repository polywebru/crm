<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class ForbiddenException extends BaseException
{
    public function render(string $message = null, $errorCode = 500, int $statusCode = null)
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
