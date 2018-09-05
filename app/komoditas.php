<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komoditas extends Model
{
    protected $fillable = ['nama_komoditas', 'id_kategori', 'gambar'];
    protected $table = 'komoditas';

     public function kategori(){
     	return $this->belongsTo('App\kategori','id_kategori','id');
    }

     public function getGambarAttribute($value)
    {
        if (!$value) {
            //return 'http://placehold.it/160x160';
            return url('/') . config('variables.gambar_komoditas.public') . 'gambar0.png';
        }

        return url('/') . config('variables.gambar_komoditas.public') . $value;
    }
    public function setGambarAttribute($photo)
    {
        $this->attributes['gambar'] = move_file($photo, 'gambar_komoditas.image');
    }
}
