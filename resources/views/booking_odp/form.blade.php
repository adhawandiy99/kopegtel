@extends('layout')
@section('title')
	.: promon :.
@endsection
@section('header')
	Form Booking ODP
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	<form method="post" action="/save_next/{{ $data->ID_Sys }}" id="nextForm">
		
	</form>
	<form class="form-horizontal" method="post">
		<input type="hidden" name="Project_ID" value="{{ $data->ID_Sys or '' }}">
	  <div class="form-group form-group-sm">
	    <label for="Project_Name" class="col-md-3 control-label">Nama Proyek</label>
	    <div class="col-md-9">
	      <input type="text" name="Project_Name" class="form-control" id="Project_Name" placeholder="Nama Proyek" value="{{ $data->Nama_Pelanggan or '' }}" readonly>
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Nama_ODP" class="col-md-3 control-label">Nama ODP</label>
	    <div class="col-md-9">
	      <input type="text" name="Nama_ODP" class="form-control" id="Nama_ODP" placeholder="Nama ODP" value="{{ old('Nama_ODP') }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Nama_ODC" class="col-md-3 control-label">Nama ODC</label>
	    <div class="col-md-9">
	      <input type="text" name="Nama_ODC" class="form-control" id="Nama_ODC" placeholder="Nama ODC" value="{{ old('Nama_ODC') }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Koordinat_ODP" class="col-md-3 control-label">Koordinat ODP</label>
	    <div class="col-md-9">
	      <input type="text" name="Koordinat_ODP" class="form-control" id="Koordinat_ODP" placeholder="Koordinat ODP" value="{{ old('Koordinat_ODP') }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Tanggal_Order" class="col-md-3 control-label">Tanggal Order</label>
	    <div class="col-md-9">
	      <input type="text" name="Tanggal_Order" class="form-control" id="Tanggal_Order" placeholder="Tanggal Input" value="{{ $data->Created_At or '' }}" readonly>
	    </div>
	  </div>
    <div class="form-group">
	    <div class="col-md-offset-3 col-md-9">
	      <button type="submit" class="btn"><span class="btn-label-icon left fa fa-database"></span>Tambah</button>
	      <button type="button" class="btn" id="next"><span class="btn-label-icon left fa fa-database"></span>Save&Next</button>
	    </div>
	  </div>
	</form>
	@if(count($booked))
	<div class="table-responsive">
	  <table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>Nama_ODP</th>
	        <th>Nama_ODC</th>
	        <th>Koordinat_ODP</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($booked as $no => $d)
	      <tr>
	        <th scope="row">{{ ++$no }}</th>
	        <td>{{ $d->Nama_ODP }}</td>
	        <td>{{ $d->Nama_ODC }}</td>
	        <td>{{ $d->Koordinat_ODP }}</td>
	        <td>
	        	<a href="#">
	        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs">
	        			<span class="btn-label-icon left fa fa-pencil"></span>Delete
	        		</button>
	        	</a>
	        </td>
	      </tr>
	      @endforeach
	    </tbody>
	  </table>
	</div>
	@endif
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
    $('#Status').select2({
      placeholder: 'Select',
      dropdownCssClass : 'no-search',
      data: [{"id":"2","text":"Revisi"},{"id":"4","text":"Approve"}],
      multiple:false
    });
    $('#next').click(function(){
    	$('#nextForm').submit();
    });
	});
	
</script>
@endsection