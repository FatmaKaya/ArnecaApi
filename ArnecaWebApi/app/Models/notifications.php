<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    public $timestamps = false;

    public function getCoache_info_ligs(){
        return $this->hasOne('App\Models\coache_info_ligs','id','coache_info_ligs_id');
    }
}
