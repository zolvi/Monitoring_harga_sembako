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
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Informasi Pangan Kota Padang</h4>
  </div>
  <div class="col-md-12">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Jenis</a></li>
          <li class="breadcrumb-item active">Tabel Jenis</li>
           <a href="{{ route('jenis.create') }}" class="btn btn-info d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
      </ol>
     
    </div>
  </div>
</div>
<div class="row page-titles">
        <div class="table-responsive">
				<table id="table" class="table m-t-30 table-hover contact-list" data-page-size="5">	
				<thead>	
					<tr>
						  <th>No</th>
              <th>Nama Jenis</th>
              <th>Aksi</th>
					</tr>
				</thead>
				<tbody>
          <?php $no = 1; ?>
        		@foreach ($items as $item)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $item->nama_jenis }}</a></td>
                      <td class="actions">
                            <ul class="list-inline" style="margin-bottom:0px;">
                                <li><a href="{{ route('jenis.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn waves-effect waves-light btn-outline-success btn-xs"><i class="fa fa-pencil"></i></a></li>
                                <li>
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route('jenis.destroy', $item->id),
                                        'method' => 'DELETE',
                                        ])
                                    !!}
                                    <button class="btn waves-effect waves-light btn-outline-danger btn-xs" title="{{ trans('app.delete_title') }}"><i class="fa fa-trash"></i></button>
                                    {!! Form::close() !!}
                                </li>
                            </ul>
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

@stop
@section('js')
<script src="{{url('assets/node_modules/footable/js/footable.all.min.js')}}"></script>
    <!--FooTable init-->
<script src="{{url('dist/js/pages/footable-init.js')}}"></script>
@stop