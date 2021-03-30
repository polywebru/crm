<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use HasFactory;

    public const VK_TYPE = 'vk';
    public const TELEGRAM_TYPE = 'tg';
    public const OK_TYPE = 'ok';
    public const FACEBOOK_TYPE = 'fb';
    public const OTHER_TYPE = 'other';

    public const TYPES = [
        self::VK_TYPE => 'ВКонтакте',
        self::TELEGRAM_TYPE => 'Telegram',
        self::OK_TYPE => 'Одноклассники',
        self::FACEBOOK_TYPE => 'Facebook',
        self::OTHER_TYPE => 'Другое',
    ];

    protected $fillable = [
        'type',
        'url',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
