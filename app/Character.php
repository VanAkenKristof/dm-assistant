<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function getProficiency()
    {
        if ($this->level >= 17) {
            return 6;
        }

        if ($this->level >= 13) {
            return 5;
        }

        if ($this->level >= 9) {
            return 4;
        }

        if ($this->level >= 5) {
            return 3;
        }

        return 2;
    }

    public function getMod($ability)
    {
        $ability = $this->$ability;

        $mod = (int)floor(($ability-10)/2);

        return $mod;
    }

    public function getModWithSymbol($ability)
    {
        if ($this->getMod($ability) < 0) {
            return $this->getMod($ability);
        }

        return "+" . $this->getMod($ability );
    }

    public function getModSavingThrow($ability)
    {
        $savingThrow = $ability . "_prof";

        if ($this->$savingThrow) {
            return $this->getMod($ability) + $this->getProficiency();
        }

        return $this->getMod($ability);
    }

    public function getModSavingThrowWithSymbol($ability)
    {
        if ($this->getModSavingThrow($ability) < 0) {
            return $this->getModSavingThrow($ability);
        }

        return "+" . $this->getModSavingThrow($ability );
    }

    public function getModSkill($skill, $ability)
    {
        $mod = $this->getMod($ability);

        if ('prof' == $this->$skill) {
            $mod += $this->getProficiency();
        }

        if ('expertise' == $this->$skill) {
            $mod += $this->getProficiency()*2;
        }

        return $mod;
    }

    public function getModSkillWithSymbol($skill, $ability)
    {
        if ($this->getModSkill($skill, $ability) < 0) {
            return $this->getModSkill($skill, $ability);
        }

        return "+" . $this->getModSkill($skill, $ability );
    }
}
