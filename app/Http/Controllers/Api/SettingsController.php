<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsController extends Controller
{
    public function __invoke()
    {
        return new JsonResource([
            'study_durations' => User::STUDY_DURATIONS,
            'user_statuses' => User::STATUSES,
        ]);
    }
}
