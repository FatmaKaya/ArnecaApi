<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sets extends Model
{
    public $timestamps = false;
    public function getMatches(){
        return $this->hasOne('App\Models\matches','sets_id','id');
    }
}
