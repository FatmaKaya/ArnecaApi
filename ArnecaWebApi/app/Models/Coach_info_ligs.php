<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class coach_info_ligs extends Model
{
    public function getWorkout_plan(){
        return $this->hasOne('App\Models\workout_plan','workout_plan_id','id');
    }
    public function getMatches(){
        return $this->hasMany('App\Models\workout_plan','workout_plan_id','id');
    }
}
