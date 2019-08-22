@extends('layout')
@section('title')
	User
@endsection
@section('header')
	<a href="/user"><button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-arrow-left"></span>Kembali</button></a> User
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	<form class="form-horizontal" method="post">
	  <div class="form-group form-group-lg">
	    <label for="Username" class="col-md-3 control-label">ID User</label>
	    <div class="col-md-9">
	      <input type="text" name="Username" class="form-control" id="Username" placeholder="ID User" value="{{ $data->Username or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Password" class="col-md-3 control-label">Password</label>
	    <div class="col-md-9">
	      <input type="password" name="Password" class="form-control" id="Password" placeholder="Password">
	      <small class="text-muted">Please do not use too weak password.</small>
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Nama" class="col-md-3 control-label">Nama</label>
	    <div class="col-md-9">
	      <input type="text" name="Nama" class="form-control" id="Nama" placeholder="Nama" value="{{ $data->Nama or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Kontak" class="col-md-3 control-label">Kontak</label>
	    <div class="col-md-9">
	      <input type="text" name="Kontak" class="form-control" id="Kontak" placeholder="Kontak" value="{{ $data->Kontak or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Alamat" class="col-md-3 control-label">Alamat</label>
	    <div class="col-md-9">

	      <textarea name="Alamat" class="form-control" id="Alamat" placeholder="Alamat">{{ $data->Alamat or '' }}</textarea>
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Profile" class="col-md-3 control-label">Profile</label>
	    <div class="col-md-9">
	      <input type="text" name="Profile" class="form-control" id="Profile" placeholder="Profile" value="{{ $data->Profile or '' }}" >
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
    $('#Profile').select2({
      placeholder: 'Select',
      dropdownCssClass : 'no-search',
      data: [{"id":"Waspang","text":"Waspang"},{"id":"Supervisor","text":"Supervisor"},{"id":"Teknisi","text":"Teknisi"},{"id":"Admin","text":"Admin"}],
      multiple:false
    });
	});
	
</script>
@endsection