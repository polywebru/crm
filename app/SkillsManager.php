<?php

namespace App;

use App\Models\Skill;
use App\Models\User;

class SkillsManager
{
    public function setUserSkills(array $skills, User $user)
    {
        $this->deleteUserSkills($user);

        foreach ($skills as $skill) {
            app(SkillManager::class)->create(['name' => $skill['name']], $user);
        }
    }

    public function deleteUserSkills(User $user)
    {
        $user->skills()->each(function (Skill $skill) {
            $skill->delete();
        });
    }
}
