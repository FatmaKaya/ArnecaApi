<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    public function getDay(){
        return $this->hasOne('App\Models\days','id','day_id');
    }
}
