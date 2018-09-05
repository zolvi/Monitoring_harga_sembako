	<?php
  
//$img_url = (isset($item) ? $item->avatar : "http://placehold.it/160x160");
  $img_url = (isset($item) ? $item->gambar : url('/') . config('variables.gambar_komoditas.public') . 'gambar0.png');
?> 
	{!! Form::label('nama', 'Nama Komoditas', ['class' => 'awesome']) !!}
	{!! Form::Input('text', 'nama_komoditas', null, ['class'=>'form-control','required']) !!}

	{!! Form::label('kategori', 'Kategori', ['class' => 'awesome']) !!}
	{!! Form::Select('id_kategori', $kategori, null, array('id'=>'kategori','class'=>'form-control','required','placeholder'=>'= Kategori =',)) !!}
	
	{!! Form::label('satuan', 'Satuan') !!}
	{!! Form::Input('text', 'satuan', null, ['id'=>'satuan','class'=>'form-control','required', 'readonly']) !!}

	{!! Form::label('jenis', 'Jenis') !!}
	{!! Form::Input('text', 'jenis', null, ['id'=>'jenis','class'=>'form-control','required', 'readonly']) !!}

	{!! Form::label('gambar', 'gambar', ['class' => 'awesome']) !!}
	{!! Form::File('gambar') !!}

	@if(isset($item))
		<script type="text/javascript">
			$('#kategori').on('change', function(e){

				var kategori = e.target.value;
				$.get('../../json-kategori?id=' + kategori,function(data){
					$('#satuan').val(data.satuan);

					var jenis = data.id_jenis;
					$.get('../../json-jenis?id=' + jenis,function(data){
					$('#jenis').val(data.nama_jenis);	
					});		
				});

			});
		</script>
	@else
		<script type="text/javascript">
			$('#kategori').on('change', function(e){

				var kategori = e.target.value;
				$.get('../json-kategori?id=' + kategori,function(data){
					$('#satuan').val(data.satuan);

					var jenis = data.id_jenis;
					$.get('../json-jenis?id=' + jenis,function(data){
					$('#jenis').val(data.nama_jenis);	
					});		
				});

			});
		</script>
	@endif