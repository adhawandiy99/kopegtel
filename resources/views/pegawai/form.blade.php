@extends('layout')
@section('title')
	.: promon :.
@endsection
@section('header')
	Form Waspang
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	<form class="form-horizontal" autocomplete="off" method="post" enctype="multipart/form-data">
	  <div class="form-group form-group-sm">
	    <label for="NIP" class="col-md-3 control-label">NIP</label>
	    <div class="col-md-9">
	      <input type="text" name="NIP" class="form-control" id="NIP" placeholder="NIP" value="{{ $data->NIP or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Nama" class="col-md-3 control-label">Nama</label>
	    <div class="col-md-9">
	    	<input type="text" name="Nama" class="form-control" id="Nama" placeholder="Nama" value="{{ $data->Nama or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Tanggal_Lahir" class="col-md-3 control-label">Tanggal Lahir</label>
	    <div class="col-md-9">
	    	<input type="text" name="Tanggal_Lahir" class="form-control" id="Tanggal_Lahir" placeholder="Tanggal_Lahir" value="{{ $data->Tanggal_Lahir or '' }}">
	    </div>
	  </div>
    <div class="form-group">
	    <div class="col-md-offset-3 col-md-9">
	      <button type="submit" class="btn"><span class="btn-label-icon left fa fa-database"></span>Submit</button>
	    </div>
	  </div>
	</form>
	<!-- odp:1500000,tiang=1000000,kabel=20000 -->
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
    $('#Tanggal_Lahir').datepicker({
			format: "yyyy-mm-dd",viewMode: 0, minViewMode: 0
		});
	});
	
</script>
@endsection