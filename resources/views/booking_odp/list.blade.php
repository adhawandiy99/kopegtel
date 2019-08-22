@extends('layout')
@section('title')
	.: promon :.
@endsection
@section('header')
	List Project Di Loker Booking ODP
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
	        <th>Jenis Project</th>
	        <th>Total Budget</th>
	        <th>Tanggal Order</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($data as $no => $d)
	      <tr>
	        <th scope="row">{{ ++$no }}</th>
	        <td>{{ $d->Nama_Pelanggan }}</td>
	        <td>{{ $d->ID_Project_Generate }}</td>
	        <td>{{ $d->Alamat }}</td>
	        <td>{{ $d->Jenis_Project }}</td>
	        <td>{{ number_format($d->Total_Budget) }}</td>
	        <td>{{ $d->Created_At }}</td>
	        <td>
	        	<a href="/booking_odp/{{ $d->ID_Sys }}">
	        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs">
	        			<span class="btn-label-icon left fa fa-pencil"></span>Update
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