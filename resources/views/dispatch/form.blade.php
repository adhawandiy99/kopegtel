@extends('layout')
@section('title')
	.: promon :.
@endsection
@section('header')
	Form Dispatch dan Material
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
	      <input type="text" name="Nama_Pelanggan" class="form-control" id="Nama_Pelanggan" placeholder="Nama Proyek" value="{{ $data->Nama_Pelanggan or '' }}" readonly>
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Total_ODP" class="col-md-3 control-label">Total ODP</label>
	    <div class="col-md-9">
	      <input type="text" name="Total_ODP" class="form-control" id="Total_ODP" placeholder="Total ODP" value="{{ $data->Total_ODP or '' }}" readonly>
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Panjang_Kabel" class="col-md-3 control-label">Panjang Kabel</label>
	    <div class="col-md-9">
	      <input type="text" name="Panjang_Kabel" class="form-control" id="Panjang_Kabel" placeholder="Panjang Kabel" value="{{ $data->Panjang_Kabel or '' }}" readonly>
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Tiang_Baru" class="col-md-3 control-label">Tiang Baru</label>
	    <div class="col-md-9">
	      <input type="text" name="Tiang_Baru" class="form-control" id="Tiang_Baru" placeholder="Tiang Baru" value="{{ $data->Tiang_Baru or '' }}" readonly>
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Total_Budget" class="col-md-3 control-label">Total Budget</label>
	    <div class="col-md-9">
	      <input type="text" name="Total_Budget" class="form-control" id="Total_Budget" placeholder="Total Budget" value="{{ $data->Total_Budget or '' }}" readonly>
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Tanggal_Input" class="col-md-3 control-label">Tanggal Input</label>
	    <div class="col-md-9">
	      <input type="text" name="Tanggal_Input" class="form-control" id="Tanggal_Input" placeholder="Tanggal Input" value="{{ $data->Created_At or '' }}" readonly>
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Teknisi" class="col-md-3 control-label">Teknisi</label>
	    <div class="col-md-9">
	      <input type="text" name="Teknisi" class="form-control" id="Teknisi" placeholder="Teknisi" value="{{ $data->Teknisi or '' }}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.1.0/autoNumeric.min.js"></script>
<script type="text/javascript">
  $(function() {
    $('#Status').select2({
      placeholder: 'Select',
      dropdownCssClass : 'no-search',
      data: [{"id":"2","text":"Revisi"},{"id":"4","text":"Approve"}],
      multiple:false
    });

    var data = <?= json_encode($employee); ?>;
    var surveyor = $('#Teknisi').select2({
      placeholder: 'Select',
      data: data
    });
    new AutoNumeric('#Total_Budget',{"decimalPlaces":0});
	});
	
</script>
@endsection