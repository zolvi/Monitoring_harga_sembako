@extends('admin.master')
@section('css')
 <!-- Footable CSS -->
    <link href="{{url('assets/node_modules/footable/css/footable.core.css')}}" rel="stylesheet">
    <link href="{{url('assets/node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{url('dist/css/style.min.css')}}" rel="stylesheet">
    <!-- page css -->
    <link href="{{url('dist/css/pages/footable-page.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="row page-titles">
	<div class="col-12">
 	<h4 class="card-title">Tabel Harga Kebutuhan Pokok dan Barang</h4>
	</div>
	</div>
<div class="row">
	<div class="col-12">
     <div class="card">
        <div class="card-body">
          <div class="col-sm-4">
                                         
        {!! Form::open() !!}
          {!! Form::label('tanggal', 'Tanggal', ['class' => 'awesome']) !!}
          {!! Form::Input('date', 'tanggal', null, ['class'=>'form-control']) !!}
          {!! Form::label('jenis', 'Jenis') !!}
          {!! Form::Select('jenis', $jenis, null, array('id'=>'jenis','class'=>'form-control','placeholder'=>'--- Pilih Jenis ---', 'required')) !!}
          {!! Form::label('pasar', 'Pasar') !!}
          {!! Form::Select('pasar', $pasar, null, array('id'=>'pasar','class'=>'form-control','placeholder'=>'--- Pilih Pasar ---', 'required')) !!}

        {!! Form::close() !!}
        <div class="card-body">
        <div class="col-md-7 align-right text-right">
                        
             <a href="#" class="create-modal btn btn-success btn-sm"></i> create</a></button>            
        </div>
</div></div></div>
        
		      <div class="table-responsive">
				  <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="5">	
				    <thead>	
					     <tr>
                  <th width="150px">No</th>
                  <th>Komoditas</th>
                  <th>pasar</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
    				</thead>
		    		<tbody>
                  <?php $no = 1; ?>
                  @foreach ($items as $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->komoditas->nama_komoditas }}</a></td>
                    <td>
                        {{ $item->pasar->nama_pasar }}
                    </td>
                    <td>{{ $item->harga }}</td>
                    <td class="actions">
                      <ul class="list-inline" style="margin-bottom:0px;">
                        <li><a data-toggle="modal" data-target="#create" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></a></li>
                    </td>
                                    
                  </tr>
                @endforeach
            </tbody>
				    <tfoot>
					     <tr>               
                  <td colspan="7">
                  	<div class="text-right">
                   		<ul class="pagination"> </ul>
                    </div>
                  </td>
               </tr>
            </tfoot>
				</table>
		</div>      
      </div>
     </div>


</div>
<!-- Form modal-->
 <!-- sample modal content -->
  <div id="create" class="modal fade" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Harga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
          {!! Form::open() !!}
          {!! Form::label('tanggal', 'Tanggal') !!}
          {!! Form::Input('date', 'tanggal', null, ['class'=>'form-control']) !!}
          {!! Form::label('komoditas', 'Komoditas') !!}
          {!! Form::Select('id_komoditas', $komoditas, null, array('id'=>'komoditas','class'=>'form-control','placeholder'=>'--- Pilih Jenis ---', 'required')) !!}
          {!! Form::label('pasar', 'Pasar') !!}
          {!! Form::Select('id_pasar', $pasar, null, array('id'=>'pasar','class'=>'form-control','placeholder'=>'--- Pilih Pasar ---', 'required')) !!}
          {!! Form::label('harga', 'harga') !!}
          {!! Form::Input('number', 'harga', null, ['class'=>'form-control']) !!}
        {!! Form::close() !!}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success waves-effect waves-light" id="add">Save changes</button>
          </div>
       </div>
      </div>
  </div>
@stop
@section('js')
<!--function add(modal)-->

<script type="text/javascript">
  $("#add").click(function(){
    $.ajax({
      type : 'POST',
      url  : 'addHarga',
      data : {
        '_token': $('input[name=_token]').val(),
        'id_komoditas': $('input[name=id_komoditas]').val(),
        'id_pasar': $('input[name=id_pasar]').val(),
        'tanggal': $('input[name=tanggal]').val(),
        'harga': $('input[name=harga]').val(),
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.id_komoditas);
          $('.error').text(data.errors.id_pasar);
          $('.error').text(data.errors.tanggal);
          $('.error').text(data.errors.harga);
        }
        else{
          $('.error').remove();
          $('#demo-foo-addrow').append("<tr class='post" + data.id + "'>"+
            "<td>" +data.id+ "</td>"+
            "<td>" +data.id_komoditas+ "</td>"+
            "<td>" +data.id_pasar+ "</td>"+
            "<td>" +data.tanggal+ "</td>"+
            "<td>" +data.harga+ "</td>"+
            "<td><a data-toggle='modal' class='btn btn-outline-warning' data-id='" +data.id+ "'data-id_komoditas='" + data.id_komoditas +"'data-id_pasar='" + data.id_pasar +"'data-tanggal='" + data.tanggal +"'data-harga='" + data.harga +"'>" +
            "<i class='fa fa-pencil'></i></a></td>"+
            "</tr>");
        }
      },
    });
  $('#id_komoditas').val('');
  $('#id_pasar').val('');
  $('#tanggal').val('');
  $('#harga').val('');
  });
</script>
<script src="{{url('assets/node_modules/footable/js/footable.all.min.js')}}"></script>
    <!--FooTable init-->
<script src="{{url('dist/js/pages/footable-init.js')}}"></script>
@stop