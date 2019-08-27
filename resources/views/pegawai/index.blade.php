@extends('layout')
@section('title')
	.:  :.
@endsection
@section('header')
	List Pegawai <a href="/pegawai/input"> <button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-file-o"></span>Register</button></a>
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
	        <th>NIP</th>
	        <th>Nama</th>
	        <th>Tanggal Lahir</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php
	    		$no = 1;
	    	?>
	    	@foreach($data as $d)
			      <tr>
			        <th scope="row">{{ $no++ }}</th>
			        <td>{{ $d->NIP }}</td>
	        		<td>{{ $d->Nama }}</td>
			        <td>{{ $d->Tanggal_Lahir }}</td>
			        <td>
			        	<a href="/pegawai/{{ $d->id }}">
			        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs">
			        			<span class="btn-label-icon left fa fa-pencil"></span>Edit
			        		</button>
			        	</a>
			        	<a href="/deletepegawai/{{ $d->id }}">
			        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs">
			        			<span class="btn-label-icon left fa fa-trash"></span>Hapus
			        		</button>
			        	</a>
			        </td>
			      </tr>
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