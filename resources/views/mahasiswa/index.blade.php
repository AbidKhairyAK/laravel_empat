<head>
	<style type="text/css">
		td,th {
			padding: 5px 10px;
		}
		tr:nth-child(even) {
			background: #ddd;
		}
		tr:nth-child(odd) {
			background: #eee;
		}
		form {
			display: inline;
		}
		button {
			cursor: pointer;
		}
	</style>
</head>
<body>
	<br>
	<a href="{{route('mahasiswa.create')}}"><button>Create Mahasiswa</button></a>
	<br>
	<br>
	<table>
		<tr>
			<th>#</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>Agama ID</th>
			<th>Options</th>
		</tr>
		<?php $no=1; ?>
		@foreach($mahasiswa as $row)

		<tr>
			<td> {{$no++}} </td>
			<td> {{$row->nama}} </td>
			<td> {{$row->jenis_kelamin}} </td>
			<td> {{date("d M Y",strtotime($row->tanggal_lahir))}} </td>
			<td> {{$row->agama_id}} </td>
			<td>
				<a href="{{route('mahasiswa.show',$row->id)}}"><button>Detail</button></a> | 
				<a href="{{route('mahasiswa.edit',$row->id)}}"><button>Edit</button></a> | 
				<form action="{{route('mahasiswa.destroy',$row->id)}}" method="post">
					{{csrf_field()}}
					{{ method_field('DELETE') }}
					<button type="submit">Delete</button>
				</form>
			</td>	
		</tr>

		@endforeach
	</table>

	<br><br>

	@if(Session::has('mahasiswa'))
		{{Session::get('mahasiswa')}}
	@endif
</body>