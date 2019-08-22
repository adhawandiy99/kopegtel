@extends('layout')
@section('title')
	User
@endsection
@section('header')
	<a href="/employee"><button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-arrow-left"></span>Kembali</button></a> User
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	<form class="form-horizontal" method="post" autocomplete="off">
	  <div class="form-group form-group-lg">
	    <label for="NIK" class="col-md-3 control-label">NIK</label>
	    <div class="col-md-9">
	      <input type="text" name="NIK" class="form-control" id="NIK" placeholder="NIK" value="{{ $data->NIK or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Nama_Employee" class="col-md-3 control-label">Nama</label>
	    <div class="col-md-9">
	      <input type="text" name="Nama_Employee" class="form-control" id="Nama_Employee" placeholder="Nama_Employee" value="{{ $data->Nama_Employee or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Job_Desc" class="col-md-3 control-label">Job Desc</label>
	    <div class="col-md-9">
	      <input type="text" name="Job_Desc" class="form-control" id="Job_Desc" placeholder="Job Desc" value="{{ $data->Job_Desc or '' }}" >
	    </div>
	  </div>
    <div class="form-group">
	    <div class="col-md-offset-3 col-md-9">
	      <button type="submit" class="btn"><span class="btn-label-icon left fa fa-database"></span>Submit</button>
	    </div>
	  </div>
	</form>

    
	</form>
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
    $('#Job_Desc').select2({
      placeholder: 'Select',
      data: [{"id":"Surveyor","text":"Surveyor"},{"id":"Leader Survey","text":"Leader Survey"},{"id":"Leader Cons","text":"Leader Cons"},{"id":"Teknisi","text":"Teknisi"}]
    });
	});
	
</script>
@endsection