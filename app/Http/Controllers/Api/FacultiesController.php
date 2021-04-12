<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacultyResource;
use App\Models\Faculty;

class FacultiesController extends Controller
{
    public function __invoke()
    {
        return FacultyResource::collection(Faculty::all());
    }
}
