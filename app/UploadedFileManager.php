<?php

namespace App;

use App\Exceptions\UploadedFileException;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class UploadedFileManager
{
    private UploadedFile $uploadedFile;

    public function store(UploadedFile $uploadedFile, User $user, string $publicity = 'local'): File
    {
        $this->uploadedFile = $uploadedFile;
        $link = $this->uploadedFile->storePublicly($publicity);

        if (!$link) {
            throw new UploadedFileException();
        }

        return app(FileManager::class)->create([
            'filename' => $this->getSavedFileName($link),
            'content_type' => $this->uploadedFile->extension(),
            'byte_size' => $this->uploadedFile->getSize(),
            'checksum' => md5_file(storage_path() . '/app/' . $link),
        ], $user);
    }

    private function getSavedFileName(string $link): string
    {
        $explodedLink = explode('/', $link);

        return end($explodedLink);
    }
}
