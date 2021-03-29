<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class LastModifiedException extends BaseException
{
    public function render()
    {
        return response([], Response::HTTP_NOT_MODIFIED);
    }
}
