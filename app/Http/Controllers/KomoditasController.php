<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\komoditas;
use App\kategori;
use App\jenis;

class KomoditasController extends Controller
{
    public function index()
    {
        $items = komoditas::all();
        $kategori=kategori::get()->pluck('nama_kategori','id');
        $jenis=jenis::get()->pluck('nama_jenis','id');
        return view('admin.komoditas.index', compact('items','kategori'));
    }
     public function create()
    {
    	$kategori=kategori::get()->pluck('nama_kategori','id');
        // $kategoris = Kategori::all();
        // $kategori = [];
        // foreach ($kategoris as $kateg) {
        //     $kategori[$kateg->id.'-'.$kateg->satuan] = $kateg->nama_kategori;
        // }


        return view('admin.komoditas.create',compact('kategori'));   
    }
    public function store(Request $request)
    {
        // $idKategori = explode("-", $request->id_kategori);
        komoditas::create([
            'nama_komoditas'=>request('nama_komoditas'),
            'gambar'=>request('gambar'),
            'id_kategori'=>request('id_kategori')
            ]);

        //return back()->withSuccess(trans('app.success_store'));
        return redirect()->route('komoditas.index')->withSuccess(trans('app.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori=kategori::get()->pluck('nama_kategori','id');
        // $kategoris = Kategori::all();
        // $kategori = [];
        // foreach ($kategoris as $kateg) {
        //     $kategori[$kateg->id.'-'.$kateg->satuan] = $kateg->nama_kategori;
        // }
        $item = komoditas::findOrFail($id);

        return view('admin.komoditas.edit', compact('item', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = komoditas::findOrFail($id);
        $idKategori = explode("-", $request->id_kategori);
        $item->update([
            'nama_komoditas'=>request('nama_komoditas'),
            'gambar'=>request('gambar'),
            'id_kategori'=>request('id_kategori')
            ]);
        //return back()->withSuccess(trans('app.success_update'));
        return redirect()->route('komoditas.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'));
    }

    public function kateg(){
        $kategori_id= Input::get('id');
        $kategori = kategori::where('id', $kategori_id)->first();

        return response()->json($kategori); 
    }
    public function jenis(){
        $jenis_id= Input::get('id');
        $jenis = jenis::where('id', $jenis_id)->first();

        return response()->json($jenis); 
    }
}
