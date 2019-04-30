<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subskill extends Model
{
    protected $table = "subskills";

    public function skillname(){
    	return $this->hasOne('App\Skill', 'id', 'skill_id');
    }
}
