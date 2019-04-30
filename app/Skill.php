<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = "skills";

    public function subskills()
    {
      return $this->hasMany('App\Subskill','skill_id','id');
      //return $this->hasMany('App\LinkOptions', 'link_id', 'id');
    }

    public function grouping()
    {
      return $this->belongsTo('App\Grouping','grouping_id','id');
    }
}
