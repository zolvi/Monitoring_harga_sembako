<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\jenis;
use App\kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $items = kategori::all();
        $jenis=jenis::get()->pluck('nama_jenis','id');
        return view('admin.kategori.index', compact('items','jenis'));
    }

    public function create()
    {
    	$jenis=jenis::get()->pluck('nama_jenis','id');

        return view('admin.kategori.create',compact('jenis'));
    }

    public function store(Request $request)
    {
        kategori::create([
            'nama_kategori'=>request('nama_kategori'),
            'satuan'=>request('satuan'),
            'id_jenis'=>request('id_jenis')
            ]);

        //return back()->withSuccess(trans('app.success_store'));
        return redirect()->route('kategori.index')->withSuccess(trans('app.success_store'));
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
    public function edit($id){
        $item = kategori::findOrFail($id);
        $jenis = jenis::pluck('nama_jenis', 'id');
        $val = $jenis[$item->id_jenis]; 
        return view('admin.kategori.edit', compact('item', 'jenis', 'val'));
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
        $item = kategori::findOrFail($id);
        $item->update([
            'nama_kategori'=>request('nama_kategori'),
            'satuan'=>request('satuan'),
            'id_jenis'=>request('id_jenis')
            ]);
        //return back()->withSuccess(trans('app.success_update'));
        return redirect()->route('kategori.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'));
    }
}
