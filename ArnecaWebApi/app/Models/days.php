<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class days extends Model
{
    public $timestamps = false;

    protected $fillable = ['week_id','day_month'];
    
    public function getWeek(){
        return $this->hasOne('App\Models\weeks','id','week_id');
    }
    public function getPlan(){
        return $this->hasMany('App\Models\plan','day_id','id');
    }
}
