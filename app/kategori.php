<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['nama_kategori', 'satuan', 'id_jenis'];
    protected $table = 'kategoris';
    public function jenis(){
    	
    return $this->belongsTo('App\jenis','id_jenis','id');
    }
}
