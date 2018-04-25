@extends('admin.layouts.app')

@section('title','Data Mahasiswa')

@section('content')
  <div class="container-fluid">
	<a href="{{route('mahasiswa.create')}}" class="btn btn-primary">Tambah Mahasiswa</a>
	<br>
	<br>
	<table class="table table-bordered table-hover">

		<thead>
		<tr>
			<th>#</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>Agama ID</th>
			<th>Options</th>
		</tr>
		</thead>

		<tbody>
		<?php $no=1; ?>
		@foreach($mahasiswa as $row)

		<tr>
			<td> {{$no++}} </td>
			<td> {{$row->nama}} </td>
			<td> {{$row->jenis_kelamin}} </td>
			<td> {{date("d M Y",strtotime($row->tanggal_lahir))}} </td>
			<td> {{$row->agama_id}} </td>
			<td>
				<a href="{{route('mahasiswa.show',$row->id)}}" class="btn btn-xs btn-success">Detail</a> | 
				<a href="{{route('mahasiswa.edit',$row->id)}}" class="btn btn-xs btn-primary">Edit</a> | 
				<form action="{{route('mahasiswa.destroy',$row->id)}}" method="post" style="display: inline;">
					{{csrf_field()}}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-xs btn-danger">Delete</button>
				</form>
			</td>	
		</tr>

		@endforeach
		</tbody>
	</table>

	<br><br>

	@if(Session::has('mahasiswa'))
		{{Session::get('mahasiswa')}}
	@endif
  </div>
@endsection