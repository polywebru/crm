<?php

namespace App\Exceptions;

use App\Models\User;
use Illuminate\Http\Response;
use Throwable;

class InactiveUserException extends BaseException
{
    private User $user;

    public function __construct(User $user, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->user = $user;
    }

    public function render(string $message = null, $errorCode = 500, int $statusCode = null)
    {
        $data = [
            'status' => false,
            'error' => [
                'code' => Response::HTTP_FORBIDDEN . '.inactive',
                'message' => 'Пользователь неактивен.',
            ],
            'user' => [
                'username' => $this->user->username,
                'last_name' => $this->user->last_name,
                'first_name' => $this->user->first_name,
            ],
        ];

        return response($data, Response::HTTP_FORBIDDEN);
    }
}
