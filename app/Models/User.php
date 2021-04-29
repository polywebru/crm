<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasRoles;

    public $guard_name = 'api';

    public const PASSWORD_MIN_LENGTH = 5;

    public const BAKALAVRIAT_DURATION = 'bakalavriat';
    public const SPECIALITET_DURATION = 'specialitet';
    public const MAGISTRATURA_DURATION = 'magistratura';

    public const STUDY_DURATIONS = [
        self::BAKALAVRIAT_DURATION => 'Бакалавриат',
        self::SPECIALITET_DURATION => 'Специалитет',
        self::MAGISTRATURA_DURATION => 'Магистратура',
    ];

    public const INTERN_STATUS = 'intern';
    public const EMPLOYEE_STATUS = 'employee';

    public const STATUSES = [
        self::INTERN_STATUS => 'Стажёр',
        self::EMPLOYEE_STATUS => 'Сотрудник',
    ];

    protected $fillable = [
        'username',
        'email',
        'phone',
        'last_name',
        'first_name',
        'middle_name',
        'gender',
        'date_birth',
        'is_active',
        'status',
        'study_begin_date',
        'study_duration',
        'password',
        'last_sign_in_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'study_begin_date' => 'date',
        'email_verified_at' => 'datetime',
        'last_sign_in_at' => 'datetime',
    ];

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function speciality(): BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function avatar(): BelongsTo
    {
        return $this->belongsTo(File::class, 'avatar_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function activable(): bool
    {
        return $this->is_active === false;
    }

    public function deactivable()
    {
        return $this->is_active === true;
    }
}
