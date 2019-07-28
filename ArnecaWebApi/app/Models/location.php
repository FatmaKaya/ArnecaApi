<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['lat','lon'];

    public function getMatches(){
        return $this->hasMany('App\Models\matches','location_id','id');
    }
}
