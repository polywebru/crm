<?php

namespace App;

use App\Models\Skill;
use App\Models\User;

class SkillManager
{
    private ?Skill $skill;

    public function __construct(Skill $skill = null)
    {
        $this->skill = $skill;
    }

    public function create(array $data, User $user): Skill
    {
        $this->skill = app(Skill::class);
        $this->skill->fill($data);
        $this->skill->user()->associate($user);
        $this->skill->save();

        return $this->skill;
    }
}
