<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    public $timestamps = false;

    protected $fillable = ['coache_info_ligs_id','bildirim1','bildirim2','bildirim3', 
                            'bildirim4','bildirim5','bildirim6','bildirim7','bildirim8'];

    public function getCoache_info_ligs(){
        return $this->hasOne('App\Models\coache_info_ligs','id','coache_info_ligs_id');
    }
}
