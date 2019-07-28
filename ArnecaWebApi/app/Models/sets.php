<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sets extends Model
{
    public $timestamps = false;

    protected $fillable = ['set1','set2','set3','set4'];
    
    public function getMatches(){
        return $this->hasOne('App\Models\matches','sets_id','id');
    }
}
