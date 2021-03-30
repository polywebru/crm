<?php

namespace App\Http\Resources\User;

use App\Http\Resources\FacultyResource;
use App\Http\Resources\JsonResource;
use App\Http\Resources\SpecialityResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'username' => $this->resource->username,
            'email' => $this->resource->email,
            'phone' => $this->resource->phone,
            'last_name' => $this->resource->last_name,
            'first_name' => $this->resource->first_name,
            'middle_name' => $this->resource->middle_name,
            'gender' => $this->resource->gender,
            'date_birth' => $this->resource->date_birth,
            'is_active' => $this->resource->is_active,
            'status' => $this->resource->status,
            'skills' => SkillResource::collection($this->whenLoaded('skills')),
            'links' => LinkResource::collection($this->whenLoaded('links')),
            'speciality' => new SpecialityResource($this->speciality),
            'faculty' => new FacultyResource(optional($this->speciality)->faculty),
            'study_begin_date' => $this->prepareDate($this->resource->study_begin_date),
            'study_duration' => $this->resource->study_duration,
            'email_verified_at' => $this->prepareDateTime($this->resource->email_verified_at),
            'last_sign_in_at' => $this->prepareDateTime($this->resource->last_sign_in_at),
            'created_at' => $this->prepareDateTime($this->resource->created_at),
            'updated_at' => $this->prepareDateTime($this->resource->updated_at),
        ];
    }
}
