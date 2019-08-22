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
	    <label for="Jenis_Project" class="col-md-3 control-label">Jenis Project</label>
	    <div class="col-md-9">
	      <input type="text" name="Jenis_Project" class="form-control" id="Jenis_Project" placeholder="Jenis Project" value="{{ $data->Jenis_Project or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Total_ODP" class="col-md-3 control-label">Total ODP</label>
	    <div class="col-md-3">
	      <input type="text" name="Total_ODP" class="form-control" id="Total_ODP" placeholder="Total ODP" value="{{ $data->Total_ODP or '' }}">
	    </div>
	    <div class="input-group input-group-sm">
			  <span class="input-group-addon">Rp</span>
			  <input type="text" id="Harga_ODP" class="form-control" placeholder="Harga ODP" value="0" readonly>
			</div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Panjang_Kabel" class="col-md-3 control-label">Panjang Kabel</label>
	    <div class="col-md-3">
	      <input type="text" name="Panjang_Kabel" class="form-control" id="Panjang_Kabel" placeholder="Panjang Kabel" value="{{ $data->Panjang_Kabel or '' }}">
	    </div>

	    <div class="input-group input-group-sm">
			  <span class="input-group-addon">Rp</span>
			  <input type="text" id="Harga_Kabel" class="form-control" placeholder="Harga Kabel" value="0" readonly>
			</div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Tiang_Baru" class="col-md-3 control-label">Tiang Baru</label>
	    <div class="col-md-3">
	      <input type="text" name="Tiang_Baru" class="form-control" id="Tiang_Baru" placeholder="Tiang Baru" value="{{ $data->Tiang_Baru or '' }}">
	    </div>

	    <div class="input-group input-group-sm">
			  <span class="input-group-addon">Rp</span>
			  <input type="text" id="Harga_Tiang" class="form-control" placeholder="Harga Tiang" value="0" readonly>
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
	      <input type="text" name="Tanggal_Input" class="form-control" id="Tanggal_Input" placeholder="Tanggal Input" value="{{ $data->Tanggal_Input or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm hidden">
	    <label for="File_Name" class="col-md-3 control-label">File Name</label>
	    <div class="col-md-9">
	      <input type="file" name="File_Name" class="form-control" id="File_Name">
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
<script src="/manual/Numeral-js-master/min/numeral.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.1.0/autoNumeric.min.js"></script>
<script type="text/javascript">
  $(function() {

    $('#Jenis_Project').select2({
      placeholder: 'Select',
      dropdownCssClass : 'no-search',
      data: [{"id":"FTTH","text":"FTTH"},{"id":"WIFI.ID","text":"WIFI.ID"}],
      multiple:false
    });
    $('#Tanggal_Input').datepicker({
			format: "yyyy-mm-dd",viewMode: 0, minViewMode: 0
		});
		$('#Total_ODP').keyup(function() {
			$('#Harga_ODP').val(1500000*$('#Total_ODP').val());
			var total = numeral($('#Harga_ODP').val()).value()+numeral($('#Harga_Tiang').val()).value()+numeral($('#Harga_Kabel').val()).value();
			$('#Total_Budget').val(total);new AutoNumeric('#Total_Budget',{"decimalPlaces":0});
  	new AutoNumeric('#Harga_ODP',{"decimalPlaces":0});
  	new AutoNumeric('#Harga_Kabel',{"decimalPlaces":0});
  	new AutoNumeric('#Harga_Tiang',{"decimalPlaces":0});
		});
		$('#Panjang_Kabel').keyup(function() {
			$('#Harga_Kabel').val(20000*$('#Panjang_Kabel').val());
			var total = numeral($('#Harga_ODP').val()).value()+numeral($('#Harga_Tiang').val()).value()+numeral($('#Harga_Kabel').val()).value();
			$('#Total_Budget').val(total);new AutoNumeric('#Total_Budget',{"decimalPlaces":0});
  	new AutoNumeric('#Harga_ODP',{"decimalPlaces":0});
  	new AutoNumeric('#Harga_Kabel',{"decimalPlaces":0});
  	new AutoNumeric('#Harga_Tiang',{"decimalPlaces":0});
		});
		$('#Tiang_Baru').keyup(function() {
			$('#Harga_Tiang').val(1000000*$('#Tiang_Baru').val());
			var total = numeral($('#Harga_ODP').val()).value()+numeral($('#Harga_Tiang').val()).value()+numeral($('#Harga_Kabel').val()).value();
			$('#Total_Budget').val(total);new AutoNumeric('#Total_Budget',{"decimalPlaces":0});
  	new AutoNumeric('#Harga_ODP',{"decimalPlaces":0});
  	new AutoNumeric('#Harga_Kabel',{"decimalPlaces":0});
  	new AutoNumeric('#Harga_Tiang',{"decimalPlaces":0});
		});

			
	});
	
</script>
@endsection