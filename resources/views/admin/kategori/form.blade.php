	{!! Form::label('nama', 'Nama Jenis', ['class' => 'awesome']) !!}
	{!! Form::Input('text', 'nama_kategori', null, ['class'=>'form-control','required']) !!}
	{!! Form::label('satuan', 'Satuan', ['class' => 'awesome']) !!}
	{!! Form::Input('text', 'satuan', null, ['class'=>'form-control','required']) !!}
	{!! Form::label('jenis', 'Jenis') !!}
	{!! Form::Select('id_jenis', $jenis, null, array('id'=>'jenis','class'=>'form-control','required','placeholder'=>'= Jenis =')) !!}