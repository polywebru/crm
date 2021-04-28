<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'publicity',
        'content_type',
        'checksum',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFilepathAttribute()
    {
        return storage_path() . '/app/local/' . $this->filename;
    }

    public function getBase64Attribute(): array
    {
        $storageFile = Storage::get('local/' . $this->filename);
        return [
            'base64' => base64_encode($storageFile),
            'content_type' => $this->content_type,
        ];
    }
}
