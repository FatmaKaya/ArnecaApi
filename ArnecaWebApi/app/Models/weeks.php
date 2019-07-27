<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class weeks extends Model
{
    public $timestamps = false;
    
    public function getMonth(){
        return $this->hasOne('App\Models\month','id','month_id');
    }
    public function getdays(){
        return $this->hasMany('App\Models\days','week_id','id');
    }
}
