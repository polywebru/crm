<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\ResetPasswordException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Traits\HasEncryptedEmailWithToken;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use HasEncryptedEmailWithToken;

    public function __invoke(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->validated());

        if ($status === Password::RESET_LINK_SENT) {
            return new JsonResponse([
                'data' => [
                    'message' => 'Ссылка для восстановления пароля успешно отправлена на указанную почту.'
                ],
            ], 200);
        } else {
            throw new ResetPasswordException(__($status));
        }
    }

    public function reset(ResetPasswordRequest $request)
    {
        $credentials = array_merge(
            $request->validated(),
            $this->decryptEmail($request->token),
        );

        $status = Password::reset(
            $credentials,
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return new JsonResponse([
                'data' => [
                    'message' => 'Пароль успешно сброшен.'
                ],
            ], 200);
        } else {
            throw new ResetPasswordException(__($status));
        }
    }
}
