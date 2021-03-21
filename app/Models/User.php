<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use Notifiable;

    public const BAKALAVRIAT_DURATION = 'bakalavriat';
    public const SPECIALITET_DURATION = 'specialitet';
    public const MAGISTRATURA_DURATION = 'magistratura';

    public const STUDY_DURATIONS = [
        self::BAKALAVRIAT_DURATION => 'Бакалавриат',
        self::SPECIALITET_DURATION => 'Специалитет',
        self::MAGISTRATURA_DURATION => 'Магистратура',
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
        'study_begin_date',
        'study_duration',
        'wishes',
        'password',
        'last_sign_in_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
