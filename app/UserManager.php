<?php

namespace App;

use App\Models\File;
use App\Models\Role;
use App\Models\Speciality;
use App\Models\User;
use App\Traits\HasPhone;
use App\Traits\HasUsername;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserManager
{
    use HasPhone;
    use HasUsername;

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
                "email" => 'Неверный email и/или пароль.',
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
            $params['username'] =
                (isset($params['username'])) ? $params['username'] : $this->getUsernameFromEmail($params['email']);
            $params['phone'] = (isset($params['phone'])) ? $this->preparePhone($params['phone']) : null;
            $params['is_active'] = false;
            $this->user->fill($params);
            $this->user->password = Hash::make($params['password']);

            $this->user->save();
            $this->user->assignRole(Role::USER_ROLE);
        });

        return $this->user;
    }

    public function update(array $params): User
    {
        if (isset($params['password'])) {
            $params['password'] = Hash::make($params['password']);
        }

        if (isset($params['speciality_id'])) {
            $this->user->speciality()->associate(Speciality::findOrFail($params['speciality_id']));
        }

        $this->user->update($params);

        return $this->user;
    }

    public function updateContactInfo(array $params): User
    {
        $params['phone'] = $this->preparePhone($params['phone']);

        return $this->update($params);
    }

    public function updateAvatar(UploadedFile $file): File
    {
        if ($this->user->avatar) {
            $avatar = $this->user->avatar;
            $this->user->avatar()->associate(null);
            $this->user->save();

            app(FileManager::class, ['file' => $avatar])->delete();
        }

        $file = app(UploadedFileManager::class)->store($file, $this->user);
        $this->user->avatar()->associate($file);
        $this->user->save();

        return $file;
    }

    public function updatePassword(string $password): User
    {
        return $this->update(['password' => $password]);
    }

    public function updateLastSignInAt(Carbon $date): User
    {
        return $this->update(['last_sign_in_at' => $date]);
    }

    public function updateStatus(string $status): User
    {
        return $this->update(['status' => $status]);
    }

    public function activate(): User
    {
        if ($this->user->activable()) {
            return $this->update(['is_active' => true]);
        } else {
            throw new \Exception('Пользователь уже активирован');
        }
    }

    public function deactivate(): User
    {
        if ($this->user->deactivable()) {
            return $this->update(['is_active' => false]);
        } else {
            throw new \Exception('Пользователь уже деактивирован');
        }
    }

    public function updateRolesAndPermissions(array $roles, array $permissions): User
    {
        $permissionsManager = app(PermissionsManager::class);

        $this->user = $permissionsManager->setRolesToUser($roles, $this->user);
        $this->user = $permissionsManager->setPermissionsToUser($permissions, $this->user);

        return $this->user;
    }

    public function delete()
    {
        $this->user->delete();
    }
}
