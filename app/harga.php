<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class harga extends Model
{
    
    protected $table = 'detail_hargas';
    
    public function komoditas(){
    	
    return $this->belongsTo('App\komoditas','id_komoditas','id');
    }
     public function pasar(){
    	
    return $this->belongsTo('App\pasar','id_pasar','id');
    }
}
