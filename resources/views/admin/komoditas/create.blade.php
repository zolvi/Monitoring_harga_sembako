@extends('admin.master')

@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Informasi Pangan Kota Padang</h4>
  </div>
  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Komoditas</a></li>
          <li class="breadcrumb-item">Tabel Komoditas</li>
          <li class="breadcrumb-item active">Tambah Komoditas</li>
      </ol>
    </div>
  </div>
</div>
<div class="row">
  <div class="row page-titles">
    <div class="box" style="border:1px solid #d2d6de;">
        {!! Form::open([
                'action' => ['KomoditasController@store'],
                'files' => true
            ])
        !!}

        <div class="box-body" style="margin:10px;">
          @include('admin.komoditas.form')
        </div>

      	<div class="box-footer" style="background-color:#f5f5f5;border-top:1px solid #d2d6de;">
      	  <button type="submit" class="btn btn-info" style="width:100px;">Save</button>
          <a class="btn btn-warning " href="{{ route('komoditas.index') }}" style="width:100px;"><i class="fa fa-btn fa-back"></i>Cancel</a>
      	</div>

        {!! Form::close() !!}
    </div>
  </div>
</div>

@stop