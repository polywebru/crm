<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\User\UserResource as BaseUserResource;

class UserResource extends BaseUserResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'permissions' => PermissionResource::collection($this->whenLoaded('permissions')),
        ]);
    }
}
