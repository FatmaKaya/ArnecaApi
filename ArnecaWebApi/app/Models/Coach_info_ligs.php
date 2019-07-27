<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class coach_info_ligs extends Model
{
    public $timestamps = false;
    
    public function getWorkout_plan(){
        return $this->hasOne('App\Models\workout_plan','id','workout_plan_id');
    }
    public function getMatches(){
        return $this->hasMany('App\Models\matches','coach_info_ligs_id','id');
    }
}
