<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AdditionalUserInfoRequest;
use App\Http\Requests\User\AvatarRequest;
use App\Http\Requests\User\ContactUserInfoRequest;
use App\Http\Requests\User\LinksRequest;
use App\Http\Requests\User\MainUserInfoRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Http\Requests\User\SkillsRequest;
use App\Http\Resources\User\UserResource;
use App\LinksManager;
use App\Models\User;
use App\SkillsManager;
use App\UserManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request): UserResource
    {
        $this->checkModelModifiedSince(Auth::user(), $request);

        $user = User::with(
            'skills',
            'links',
            'speciality',
            'speciality.faculty'
        )->find(Auth::user()->id);

        return new UserResource($user);
    }

    public function updateMainInfo(MainUserInfoRequest $request): UserResource
    {
        $user = app(UserManager::class, ['user' => Auth::user()])->update($request->validated());

        return new UserResource($user->load('skills', 'links', 'speciality', 'speciality.faculty'));
    }

    public function updateContactInfo(ContactUserInfoRequest $request): UserResource
    {
        $user = app(UserManager::class, ['user' => Auth::user()])->updateContactInfo($request->validated());

        return new UserResource($user->load('skills', 'links', 'speciality', 'speciality.faculty'));
    }

    public function updateAdditionalInfo(AdditionalUserInfoRequest $request): UserResource
    {
        $user = app(UserManager::class, ['user' => Auth::user()])->update($request->validated());

        return new UserResource($user->load('skills', 'links', 'speciality', 'speciality.faculty'));
    }

    public function setAvatar(AvatarRequest $request)
    {
        $file = app(UserManager::class, ['user' => Auth::user()])->updateAvatar($request->file('avatar'));

        return new JsonResponse($file->base64);
    }

    public function deleteAvatar()
    {
        app(UserManager::class, ['user' => Auth::user()])->deleteAvatar();

        return new JsonResponse([
            'status' => true,
        ], 200);
    }

    public function updatePassword(PasswordRequest $request): UserResource
    {
        $user = app(UserManager::class, ['user' => Auth::user()])->updatePassword($request->password);

        return new UserResource($user->load('skills', 'links', 'speciality', 'speciality.faculty'));
    }

    public function links(LinksRequest $request): Response
    {
        $data = $request->validated();

        app(LinksManager::class)->createUserLinks($data['links'], Auth::user());

        return response()->noContent();
    }

    public function skills(SkillsRequest $request): Response
    {
        $data = $request->validated();

        app(SkillsManager::class)->setUserSkills($data['skills'], Auth::user());

        return response()->noContent();
    }
}
