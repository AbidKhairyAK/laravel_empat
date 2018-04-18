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
	</style>
</head>
<body>
	<br>
	<!-- <a href="{{url('article/create')}}">Create Article</a> -->
	<a href="{{route('blog.create')}}">Create Article</a>
	<br>
	<br>
	<table>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Date</th>
			<th>Option</th>
		</tr>
		<?php $no=1; ?>
		@foreach($article as $row)

		<tr>
			<td> {{$no++}} </td>
			<td> {{$row->title}} </td>
			<td> {{date('d M Y H:i',strtotime($row->created_at))}} </td>
			<td>
				<a href="{{route('blog.show',$row->id)}}">Detail</a> | 
				<a href="{{route('blog.edit',$row->id)}}">Edit</a> | 
				<!-- <a href="{{route('blog.destroy',$row->id)}}">Delete</a>  -->
				<form action="{{route('blog.destroy',$row->id)}}" method="post">
					{{csrf_field()}}
					{{ method_field('DELETE') }}
					<button type="submit">Delete</button>
				</form>
			</td>
		</tr>

		@endforeach
	</table>

	<br><br>

	@if(Session::has('article'))
		{{Session::get('article')}}
	@endif
</body>