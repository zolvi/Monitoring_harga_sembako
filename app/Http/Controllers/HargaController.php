<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\harga;
use App\jenis;
use App\pasar;
use App\komoditas;
use Validator;
use response;
use Illuminate\Support\Facedes\input;
use App\http\Requests;

class HargaController extends Controller
{
    public function index()
    {
        $items = harga::all();
        $jenis=jenis::get()->pluck('nama_jenis','id');
        $pasar=pasar::get()->pluck('nama_pasar','id');
        $komoditas=komoditas::get()->pluck('nama_komoditas','id');
        return view('admin.harga.index', compact('items','jenis','pasar','komoditas'));
    }

    public function addHarga(Request $req)
    {
    	$rules = array(
    		'id_komoditas' => 'required',
    		'id_pasar' => 'required',
    		'tanggal' => 'required',
    		'harga' => 'required',
    	);
    $validator = Validator::make ( input::all(), $rules);
    if($validator->fails()){
    	return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
    }
    else{
    	$harga = new harga;
    	$harga->id_komoditas = $req->id_komoditas;
    	$harga->id_pasar = $req->id_pasar;
    	$harga->tanggal = $req->tanggal;
    	$harga->harga = $req->harga;
    	$harga->save();
    	return response()->json($harga);
    }

    }
}
