<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Resources\Json\JsonResource as BaseJsonResource;

abstract class JsonResource extends BaseJsonResource
{
    protected function prepareDate(?Carbon $date): ?string
    {
        return $date ? $date->format('Y-m-d') : null;
    }

    protected function prepareDateTime(?DateTime $dateTime): ?string
    {
        return $dateTime ? $dateTime->format('Y-m-d H:i:s') : null;
    }
}
