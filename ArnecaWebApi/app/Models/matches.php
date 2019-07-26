<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class matches extends Model
{
    public function getCoache_info_ligs(){
        return $this->hasOne('App\Models\coache_info_ligs','id','coache_info_ligs_id');
    }
    public function getLocation(){
        return $this->hasOne('App\Models\location','id','location_id');
    }
}
