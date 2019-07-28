<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class workout_plan extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['name'];
    
    public function getCoach_info_ligs(){
        return $this->hasOne('App\Models\coach_info_ligs','workout_plan_id','id');
    }
    public function getMonths(){
        return $this->hasMany('App\Models\month','workout_plan_id','id');
    }
}
