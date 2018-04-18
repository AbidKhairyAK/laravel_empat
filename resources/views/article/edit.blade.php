<ul>
	@foreach($errors->all() as $row)
		<li> {{$row}} </li>
	@endforeach
</ul>
<br>
<form action="{{route('blog.update',$article->id)}}" method="post">
	{{ method_field('PATCH') }}
	<input type="hidden" name="id" value="{{$article->id}}">
	<table>
		<tr>
			<td>Title</td>
			<td><input type="text" name="title" value="{{$article->title}}"> {{$errors->first('title')}}</td>
		</tr>
		<tr>
			<td>Content</td>
			<td><textarea name="content">{{$article->content}}</textarea> {{$errors->first('content')}}</td>
		</tr>
		{{csrf_field()}}
		<tr>
			<td></td>
			<td><button type="submit">Submit</button></td>
		</tr>
	</table>
</form>