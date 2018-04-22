<br>
<a href="{{route('mahasiswa.index')}}"><button>Back to Home</button></a>
<br><br>
<table>
	<tr>
		<td>First Name </td>
		<td><input type="text" name="first_name" value="{{$mahasiswa->first_name}}" disabled> </td>
	</tr>
	<tr>
		<td>Last Name </td>
		<td><input type="text" name="last_name"  value="{{$mahasiswa->last_name}}" disabled> </td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="email" name="email"  value="{{$mahasiswa->email}}" disabled> </td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>
			<label><input type="radio" name="jenis_kelamin" value="L"  disabled {{($mahasiswa->jenis_kelamin == 'Laki-laki') ? 'checked' : ''}}> Laki-laki </label> || 
			<label><input type="radio" name="jenis_kelamin" value="P"  disabled {{($mahasiswa->jenis_kelamin == 'Perempuan') ? 'checked' : ''}}> Perempuan </label>
		 
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><textarea name="alamat" disabled>{{$mahasiswa->alamat}}</textarea </td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td><input type="date" name="tanggal_lahir" value="{{$mahasiswa->tanggal_lahir}}" disabled> </td>
	</tr>
	<tr>
		<td>Agama</td>
		<td>
			<select name="agama_id" disabled>
				<option>--Silahkan Pilih--</option>
				@foreach($agama as $row)
					<option name="agama_id" value="{{$row->id}}" {{($mahasiswa->agama_id == $row->id) ? 'selected' : ''}}>{{$row->agama}}</option>
				@endforeach
			</select>
		
		</td>
	</tr>
		<td>Created at</td>
		<td><input type="text" name="created_at" value="{{$mahasiswa->created_at}}" disabled></td>
	</tr>
	<tr>
		<td>Updated at</td>
		<td><input type="text" name="updated_at" value="{{$mahasiswa->updated_at}}" disabled></td>
	</tr>
	@if($mahasiswa->deleted_at != null)
	<tr>
		<td>Deleted at</td>
		<td><input type="text" name="deleted_at" value="{{$mahasiswa->deleted_at}}" disabled></td>
	</tr>
	@endif
</table>