<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        $trace = env("APP_DEBUG") ? ['trace' => $e->getTrace()] : [];

        if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
            $message = ($e->getMessage() !== '') ? $e->getMessage() : 'Ничего не найдено';
            $error = array_merge([
                'code' => 404,
                'message' => $message,
            ], $trace);

            return response()->json([
                'success' => false,
                'error' => $error,
            ], 404);
        } elseif ($e->getMessage() === 'Token has expired') {
            $error = array_merge([
                'code' => 401,
                'message' => 'Время действия токена истекло.',
            ], $trace);

            return response()->json([
                'success' => false,
                'error' => $error,
            ], 401);
        } elseif ($e instanceof ValidationException) {
            $error = array_merge([
                'code' => 400,
                'errors' => $e->validator->errors(),
            ], $trace);

            return response()->json([
                'success' => false,
                'error' => $error,
            ], 400);
        } elseif ($e instanceof BaseException) {
            return $e->render();
        } elseif ($e instanceof HttpException) {
            $error = array_merge([
                'code' => $e->getStatusCode(),
                'message' => $e->getMessage(),
            ], $trace);

            return response()->json([
                'success' => false,
                'error' => $error,
            ], $e->getStatusCode());
        } else {
            $error = array_merge([
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ], $trace);

            return response()->json([
                'success' => false,
                'error' => $error,
            ], 500);
        }
    }
}
