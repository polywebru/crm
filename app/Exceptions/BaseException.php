<?php

namespace App\Exceptions;

use Exception;

abstract class BaseException extends Exception
{
    public function render(string $message = null, $errorCode = 500, int $statusCode = null)
    {
        if ($message) {
            $data = [
                'status' => false,
                'error' => [
                    'code' => $errorCode,
                    'message' => $message,
                ],
            ];
        } else {
            $data = [];
        }

        if (!$statusCode) {
            $statusCode = $errorCode;
        }

        return response($data, $statusCode);
    }
}
