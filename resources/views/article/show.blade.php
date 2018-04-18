<br>
<table>
	<tr>
		<td>Title</td>
		<td><input type="text" name="title" value="{{$article->title}}" disabled=""></td>
	</tr>
	<tr>
		<td>Content</td>
		<td><textarea name="content" disabled>{{$article->content}}</textarea></td>
	</tr>
	<tr>
		<td>Created at</td>
		<td><input type="text" name="created_at" value="{{$article->created_at}}" disabled=""></td>
	</tr>
	<tr>
		<td>Updated at</td>
		<td><input type="text" name="updated_at" value="{{$article->updated_at}}" disabled=""></td>
	</tr>
	@if($article->deleted_at != null)
	<tr>
		<td>Deleted at</td>
		<td><input type="text" name="deleted_at" value="{{$article->deleted_at}}" disabled=""></td>
	</tr>
	@endif
</table>