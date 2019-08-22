@extends('layout')
@section('title')
	.: promon :.
@endsection
@section('header')
	Form Update Teknisi
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	<form class="form-horizontal" method="post" autocomplete="off" enctype="multipart/form-data">
	  <div class="form-group form-group-sm">
	    <label for="Nama_Pelanggan" class="col-md-3 control-label">Nama Proyek</label>
	    <div class="col-md-9">
	      <input type="text" name="Nama_Pelanggan" class="form-control" id="Nama_Pelanggan" placeholder="Nama Proyek" value="{{ $data->Nama_Pelanggan or '' }}" readonly>
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
	    <div class="col-md-9">
	      <input type="text" name="Total_ODP" class="form-control" id="Total_ODP" placeholder="Total ODP" value="{{ $data->Total_ODP or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Panjang_Kabel" class="col-md-3 control-label">Panjang Kabel</label>
	    <div class="col-md-9">
	      <input type="text" name="Panjang_Kabel" class="form-control" id="Panjang_Kabel" placeholder="Panjang Kabel" value="{{ $data->Panjang_Kabel or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Tiang_Baru" class="col-md-3 control-label">Tiang Baru</label>
	    <div class="col-md-9">
	      <input type="text" name="Tiang_Baru" class="form-control" id="Tiang_Baru" placeholder="Tiang Baru" value="{{ $data->Tiang_Baru or '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Tanggal_Input" class="col-md-3 control-label">Tanggal Input</label>
	    <div class="col-md-9">
	      <input type="text" name="Tanggal_Input" class="form-control" id="Tanggal_Input" placeholder="Tanggal Input" value="{{ $data->Tgl_Status }}">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="File_Teknisi" class="col-md-3 control-label">File Teknisi</label>
	    <div class="col-md-9">
	      <input type="file" name="File_Teknisi" class="form-control" id="File_Teknisi" placeholder="Tanggal Input">
	    </div>
	  </div>
	  <div class="form-group form-group-sm">
	    <label for="Status_Teknisi" class="col-md-3 control-label">Status</label>
	    <div class="col-md-9">
	      <input type="text" name="Status_Teknisi" class="form-control" id="Status_Teknisi" placeholder="Status" value="{{ $data->Status_Teknisi }}">
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
    $('#Status_Teknisi').select2({
      placeholder: 'Select',
      dropdownCssClass : 'no-search',
      data: [{"id":"Selesai","text":"Selesai"},{"id":"On-Going","text":"On-Going"}],
      multiple:false
    });
    $('#Jenis_Project').select2({
      placeholder: 'Select',
      dropdownCssClass : 'no-search',
      data: [{"id":"FTTH","text":"FTTH"},{"id":"WIFI.ID","text":"WIFI.ID"}],
      multiple:false
    });
    $('#Tanggal_Input').datepicker({
			format: "yyyy-mm-dd",viewMode: 0, minViewMode: 0
		});
	});
	
</script>
@endsection