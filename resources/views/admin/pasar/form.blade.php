<?php
  
//$img_url = (isset($item) ? $item->avatar : "http://placehold.it/160x160");
  $img_url = (isset($item) ? $item->gambar : url('/') . config('variables.gambar_pasar.public') . 'gambar0.png');
?> 
{!! Form::label('nama_pasar', 'Nama Pasar', ['class' => 'awesome']) !!}
{!! Form::Input('text', 'nama_pasar', null, ['class'=>'form-control','required']) !!}

{!! Form::label('alamat', 'Alamat', ['class' => 'awesome']) !!}
{!! Form::Input('text', 'alamat', null, ['class'=>'form-control','required']) !!}

{!! Form::label('kecamatan', 'Kecamatan', ['class' => 'awesome']) !!}
{!! Form::Input('text', 'kecamatan', null, ['class'=>'form-control','required']) !!}

{!! Form::label('kode_pos', 'Kode Pos', ['class' => 'awesome']) !!}
{!! Form::Input('text', 'kode_pos', null, ['class'=>'form-control','required']) !!}

{!! Form::label('telp', 'Telepon', ['class' => 'awesome']) !!}
{!! Form::Input('text', 'telp', null, ['class'=>'form-control','required']) !!}

{!! Form::label('latitude', 'Latitude', ['class' => 'awesome']) !!}
{!! Form::Input('text', 'latitude', null, ['class'=>'form-control','required']) !!}

{!! Form::label('longitude', 'Longitude', ['class' => 'awesome']) !!}
{!! Form::Input('text', 'longitude', null, ['class'=>'form-control','required']) !!}

{!! Form::label('gambar', 'gambar', ['class' => 'awesome']) !!}
{!! Form::File('gambar') !!}

