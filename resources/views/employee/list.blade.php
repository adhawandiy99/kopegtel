@extends('layout')
@section('title')
	Employee
@endsection
@section('header')
	List Employee <a href="/employee/input"> <button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-file-o"></span>Register</button></a>
@endsection
@section('css')
	<link href="/manual/datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
	<div class="table-responsive">
	  <table class="table table-bordered" id="datatable">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>NIK</th>
	        <th>Nama</th>
	        <th>Job Desc</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($data as $no => $d)
	      <tr>
	        <th scope="row">{{ ++$no }}</th>
	        <td>{{ $d->NIK }}</td>
	        <td>{{ $d->Nama_Employee }}</td>
	        <td>{{ $d->Job_Desc }}</td>
	        <td>
	        	<a href="/employee/{{ $d->ID_Sys }}">
	        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs">
	        			<span class="btn-label-icon left fa fa-pencil"></span>Edit
	        		</button>
	        	</a>
	        	
	        	<form method="POST" action="/deleteEmployee/{{ $d->ID_Sys }}" accept-charset="UTF-8" style="display:inline" id="FormDelete">
              <button class="btn btn-danger btn-outline btn-rounded btn-xs" type="submit">
              <i class="fa fa-trash"></i> 
                Delete
              </button>
            </form>
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
			$('#FormDelete').submit(function(e){
				var txt;
		    var r = confirm("Delete User?");
		    if(r == false) {
		      e.preventDefault();
    		}
			});
		});
	</script>
@endsection