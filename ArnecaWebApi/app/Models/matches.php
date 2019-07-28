<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class matches extends Model
{
    public $timestamps = false;

    protected $fillable = ['coach_info_ligs_id','title','lig','date','time','dateRaw','order',
                            'yer','location_id','takimA','takimB','imgA','imgB','skor','sets_id'];
    
    public function getCoache_info_ligs(){
        return $this->hasOne('App\Models\coach_info_ligs','id','coache_info_ligs_id');
    }
    public function getLocation(){
        return $this->hasOne('App\Models\location','id','location_id');
    }
    public function getSets(){
        return $this->hasOne('App\Models\sets','id','sets_id');
    }
}
