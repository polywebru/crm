<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpecialityResource;
use App\Models\Faculty;
use App\Models\Speciality;

class SpecialitiesController extends Controller
{
    public function __invoke()
    {
        return SpecialityResource::collection(Speciality::with('faculty')->get());
    }

    public function getSpecialitiesByFacultyId(Faculty $faculty)
    {
        return SpecialityResource::collection($faculty->specialities);
    }
}
