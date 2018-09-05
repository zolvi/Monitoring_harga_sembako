<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\jenis;
use App\kategori;
class JenisController extends Controller
{
    public function index()
    {
        $items = jenis::all();
        return view('admin.jenis.index', compact('items'));
    }
    public function create()
    {
    	return view('admin.jenis.create');
    }
    public function store(Request $request)
    {
        jenis::create($request->all());

        //return back()->withSuccess(trans('app.success_store'));
        return redirect()->route('jenis.index')->withSuccess(trans('app.success_store'));
    }
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
        $item = jenis::findOrFail($id);

        return view('admin.jenis.edit', compact('item'));
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
        $item = jenis::findOrFail($id);
        $item->update($request->all());
        //return back()->withSuccess(trans('app.success_update'));
        return redirect()->route('jenis.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori= kategori::where('id_jenis', $id)->get();
        $jenis= jenis::find($id);
        foreach ($kategori as $kateg) {
            $kateg->destroy($id);
        }
        $jenis->destroy($id);
        return back()->withSuccess(trans('app.success_destroy'));
    }

}
