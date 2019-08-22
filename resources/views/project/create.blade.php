@extends('layout')
@section('title')
	.: promon :.
@endsection
@section('header')
	Create Order
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
	  <div class="form-group form-group-sm">
	    <label for="Nama_Pelanggan" class="col-md-3 control-label">Nama Proyek</label>
	    <div class="col-md-9">
	      <input type="text" name="Nama_Pelanggan" class="form-control" id="Nama_Pelanggan" placeholder="Nama Proyek" value="{{ $data->Nama_Pelanggan or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Alamat" class="col-md-3 control-label">Alamat</label>
	    <div class="col-md-9">
	      <textarea name="Alamat" class="form-control" id="Alamat" placeholder="Alamat">{{ $data->Alamat or '' }}</textarea>
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Koordinat" class="col-md-3 control-label">Koordinat</label>
	    <div class="col-md-9">
	      <input type="text" name="Koordinat" class="form-control" id="Koordinat" placeholder="Koordinat" value="{{ $data->Koordinat or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Surveyor" class="col-md-3 control-label">Waspang</label>
	    <div class="col-md-9">
	      <input type="text" name="Surveyor" class="form-control" id="Surveyor" placeholder="Waspang" value="{{ $data->Surveyor or '' }}">
	    </div>
	  </div>
    <div class="form-group">
	    <div class="col-md-offset-3 col-md-9">
	      <button type="submit" class="btn"><span class="btn-label-icon left fa fa-database"></span>Submit</button>
	    </div>
	  </div>
	</form>
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
    $('#Profile').select2({
      placeholder: 'Select',
      dropdownCssClass : 'no-search',
      data: [{"id":"Developer","text":"Developer"},{"id":"Tenant","text":"Tenant"},{"id":"Guest","text":"Guest"},{"id":"Cashier","text":"Cashier"},{"id":"Admin","text":"Admin"}]
    });
    var data = <?= json_encode($employee); ?>;
    var surveyor = $('#Surveyor').select2({
      placeholder: 'Select',
      data: data
    });
	});
	
</script>
@endsection