<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;

class pasar extends Model
{
     protected $fillable = ['nama_pasar', 'alamat', 'kecamatan', 'kode_pos', 'telp', 'latitude', 'longitude', 'gambar'];

    public function getGambarAttribute($value)
    {
        if (!$value) {
            //return 'http://placehold.it/160x160';
            return url('/') . config('variables.gambar_pasar.public') . 'gambar0.png';
        }

        return url('/') . config('variables.gambar_pasar.public') . $value;
    }
    public function setGambarAttribute($photo)
    {
        $this->attributes['gambar'] = move_file($photo, 'gambar_pasar.image');
    }
}
