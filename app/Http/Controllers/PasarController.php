<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pasar;

class PasarController extends Controller
{
    public function index()
    {
        $items = pasar::all();
        return view('admin.pasar.index', compact('items'));
    }
 
    public function create()
    {
    	return view('admin.pasar.create');
    }
    public function store(Request $request)
    {
        pasar::create($request->all());

        //return back()->withSuccess(trans('app.success_store'));
        return redirect()->route('pasar.index')->withSuccess(trans('app.success_store'));
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
        $item = pasar::findOrFail($id);

        return view('admin.pasar.edit', compact('item'));
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
        $item = pasar::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('pasar.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pasar::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'));
    }
}
