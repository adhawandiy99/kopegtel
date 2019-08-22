@extends('layout')
@section('title')
  .: promon :.
@endsection
@section('header')
  SELAMAT DATANG DI APLIKASI PENENTUAN<br>ANGGARAN PADA MITRA KERJA(KOPEGTEL)<br>BERBASIS WEB
@endsection
@section('css')
  <style type="text/css">
    .no-search .select2-search {
        display:none
    }
  </style>
@endsection
@section('content')
<div id="c3-bar" style="height: 250px"></div>
@endsection
@section('js')
	<script>
  $(function() {
    var line = <?= json_encode($line); ?>;
    var data = {
      columns: line,
      type: 'bar',
        axes: {
            data2: 'y2'
        }
    };

    c3.generate({
      bindto: '#c3-bar',
      color: { pattern: [ '#FF5722', '#4CAF50' ] },
      data: data,
      axis: {
        x: {
            type: 'category',
            categories: ['Total Project', 'Total On-Going']
        },y : {
            tick: {
                format: d3.format(',')
            }
        }
      },tooltip: {
        format: {
            value: function (value, ratio, id) {
                var format = d3.format(',');
                return format(value);
            }
        }
    }
    });
  });
	</script>
@endsection