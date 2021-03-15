<?php

namespace App;

use App\Models\User;
use App\Traits\HasPhone;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserManager
{
    use HasPhone;

    private ?User $user;

    public function __construct(?User $user = null)
    {
        $this->user = $user;
    }

    public function auth($email, $password, $remember = false)
    {
        $this->user = User::where('email', $email)->first();

        if (!$this->user) {
            throw ValidationException::withMessages([
                "email" => 'Неверный email',
            ]);
        }

        if (!Hash::check($password, $this->user->password)) {
            throw ValidationException::withMessages([
                "email" => 'Неверный email и/или пароль.',
            ]);
        }

        $ttl = ($remember) ? env('JWT_TTL_REMEMBER') : env('JWT_TTL');

        return auth()->setTTL($ttl)->login($this->user);
    }

    public function logout()
    {
        auth()->logout();
    }

    public function create(array $params)
    {
        DB::transaction(function () use ($params) {
            $this->user = app(User::class);
            $params['phone'] = (isset($params['phone'])) ? $this->preparePhone($params['phone']) : null;
            $this->user->fill($params);
            $this->user->password = Hash::make($params['password']);
            $this->user->save();
        });

        return $this->user;
    }

    public function update(array $params): User
    {
        if (isset($params['password'])) {
            $params['password'] = Hash::make($params['password']);
        }

        $this->user->update($params);

        return $this->user;
    }

    public function updateLastSignInAt(Carbon $date)
    {
        $this->update(['last_sign_in_at' => $date]);
    }
}
