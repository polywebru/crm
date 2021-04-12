<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class InactiveUserException extends BaseException
{
    public function render(string $message = null, int $errorCode = 500, int $statusCode = null)
    {
        return parent::render(
            'Пользователь неактивен.',
            Response::HTTP_FORBIDDEN . '.inactive',
            Response::HTTP_FORBIDDEN
        );
    }
}
