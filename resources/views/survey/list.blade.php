@extends('layout')
@section('title')
	.: promon :.
@endsection
@section('header')
	List Project Di Loker Waspang
@endsection
@section('css')
	<link href="/manual/datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
	<div class="table-primary">
	  <table class="table table-bordered" id="datatables">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>Nama Proyek</th>
	        <th>ID Project</th>
	        <th>Alamat</th>
	        <th>Koordinat</th>
	        @if(Request::segment(1) <> 'inbox')
	        	<th>Action</th>
	        @else
	        	<th>Status</th>
	        @endif
	      </tr>
	    </thead>
	    <tbody>
	    	<?php
	    		$no = 1;
	    	?>
	    	@foreach($data as $d)
		    	@if(session('auth')->ID_Sys == $d->Surveyor or session('auth')->Profile=='Admin')
			      <tr>
			        <th scope="row">{{ $no++ }}</th>
			        <td>{{ $d->Nama_Pelanggan }}</td>
	        		<td>{{ $d->ID_Project_Generate }}</td>
			        <td>{{ $d->Alamat }}</td>
			        <td>{{ $d->Koordinat }}</td>
			        <td>
			        	@if(Request::segment(1) <> 'inbox')
				        	<a href="/survey/{{ $d->ID_Sys }}">
				        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs">
				        			<span class="btn-label-icon left fa fa-pencil"></span>Edit
				        		</button>
				        	</a>
			        	@else
			        		<label class="label label-success">{{ $d->Nama_Step }}</label>
			        	@endif
			        </td>
			      </tr>
		      @endif
	      @endforeach
	    </tbody>
	  </table>
	</div>
@endsection
@section('js')
	<script src="/manual/datatable/dataTables.buttons.min.js"></script>
  <script src="/manual/datatable/buttons.print.min.js"></script>
	<script type="text/javascript">
		$(function(){
	    $('#datatables').dataTable({
	    		dom: 'Bfrtip',
	        buttons: [
	            'print'
	        ]
	    });
    	$('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
		});
	</script>
@endsection