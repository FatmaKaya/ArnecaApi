<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    public $timestamps = false;

    protected $fillable = ['day_id','day_month','hours','name','location'];
    
    public function getDay(){
        return $this->hasOne('App\Models\days','id','day_id');
    }
}
