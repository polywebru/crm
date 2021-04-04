<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class UploadedFileException extends Exception
{
    public function __construct()
    {
        parent::__construct('Ошибка при загрузке файла.');
    }
}
