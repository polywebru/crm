<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class LastModifiedException extends BaseException
{
    public function render(string $message = null, $errorCode = 500, int $statusCode = null)
    {
        return parent::render(null, Response::HTTP_NOT_MODIFIED);
    }
}
