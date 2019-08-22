@extends('layout')
@section('title')
	.: promon :.
@endsection
@section('header')
	List Project Selesai
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
	        <th>Jenis Project</th>
	        <th>Total ODP</th>
	        <th>Panjang Kabel</th>
	        <th>Tiang Baru</th>
	        <th>Total Budget</th>
	        <th>File Teknisi</th>
	        <th>Tgl Status</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php
	    		$total = 0;
	    	?>
	    	@foreach($data as $no => $d)
	    	<?php
	    		$total = $total+$d->Total_Budget;
	    	?>
	      <tr>
	        <th scope="row">{{ ++$no }}</th>
	        <td>{{ $d->Nama_Pelanggan }}</td>
	        <td>{{ $d->ID_Project_Generate }}</td>
	        <td>{{ $d->Alamat }}</td>
	        <td>{{ $d->Koordinat }}</td>
	        <td>{{ $d->Jenis_Project }}</td>
	        <td>{{ $d->Total_ODP }}</td>
	        <td>{{ number_format($d->Panjang_Kabel) }}</td>
	        <td>{{ $d->Tiang_Baru }}</td>
        	<td>{{ number_format($d->Total_Budget) }}</td>
        	<td><a href="/upload/teknisi/{{ $d->File_Teknisi }}">{{ $d->File_Teknisi }}</a></td>
	        <td>{{ $d->Tgl_Status }}</td>
	      </tr>
	      @endforeach
<!-- 
	      <tr>
	        <th colspan="9">Jumlah Rupiah</th>
	        <td colspan="3">{{ number_format($total) }}</td>
	      </tr> -->
	    </tbody>
	  </table>
	</div>
@endsection
@section('js')
  <script src="/manual/datatable/dataTables.buttons.min.js"></script>
  <script src="/manual/datatable/buttons.print.min.js"></script>
	<script type="text/javascript">
	  $(function() {
	    $('#datatables').dataTable({
	    		dom: 'Bfrtip',
	        buttons: [
	            'print'
	        ]
	    });
	    $('#datatables_wrapper .table-caption').text('Some header text');
    	$('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
	  });
		
	</script>
@endsection