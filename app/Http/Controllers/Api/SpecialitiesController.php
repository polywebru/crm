<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpecialityResource;
use App\Models\Speciality;

class SpecialitiesController extends Controller
{
    public function __invoke()
    {
        return SpecialityResource::collection(Speciality::with('faculty')->get());
    }
}
