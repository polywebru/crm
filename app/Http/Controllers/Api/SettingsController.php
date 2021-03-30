<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsController extends Controller
{
    public function __invoke()
    {
        return new JsonResource([
            'user_statuses' => User::STATUSES,
            'user_study_durations' => User::STUDY_DURATIONS,
            'link_types' => Link::TYPES,
        ]);
    }
}
