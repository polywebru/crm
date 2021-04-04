<?php

namespace App;

use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class FileManager
{
    private ?File $file;

    public function __construct(File $file = null)
    {
        $this->file = $file;
    }

    public function create(array $params, User $user): File
    {
        $this->file = app(File::class);
        $this->file->fill($params);
        $this->file->user()->associate($user);
        $this->file->save();

        return $this->file;
    }

    public function delete(): ?bool
    {
        $delete = Storage::delete($this->file->publicity . '/' . $this->file->filename);

        if ($delete) {
            return $this->file->delete();
        } else {
            return false;
        }
    }
}
