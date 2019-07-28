<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class month extends Model
{
    public $timestamps = false;

    protected $fillable = ['name','workout_plan_id'];
    
    public function getWorkout_plan(){
        return $this->hasOne('App\Models\workout_plan','id','workout_plan_id');
    }
    public function getWeeks(){
        return $this->hasMany('App\Models\weeks','month_id','id');
    }
}
