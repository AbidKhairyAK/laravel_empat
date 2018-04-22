<br>
<a href="{{route('mahasiswa.index')}}"><button>Back to Home</button></a>
<br><br>
<form action="{{route('mahasiswa.store')}}" method="post">
	<table>
		<tr>
			<td>First Name </td>
			<td><input type="text" name="first_name" value="{{old('first_name')}}"> {{$errors->first('first_name')}} </td>
		</tr>
		<tr>
			<td>Last Name </td>
			<td><input type="text" name="last_name"  value="{{old('last_name')}}"> {{$errors->first('last_name')}} </td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email"  value="{{old('email')}}"> {{$errors->first('email')}} </td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"  value="{{old('password')}}"> {{$errors->first('password')}} </td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<label><input type="radio" name="jenis_kelamin" value="L" {{(old('jenis_kelamin') == 'L') ? 'checked' : ''}}> Laki-laki </label> || 
				<label><input type="radio" name="jenis_kelamin" value="P" {{(old('jenis_kelamin') == 'P') ? 'checked' : ''}}> Perempuan </label>
				{{$errors->first('jenis_kelamin')}} 
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><textarea name="alamat">{{old('alamat')}}</textarea>{{$errors->first('alamat')}} </td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><input type="date" name="tanggal_lahir" value="{{old('tanggal_lahir')}}"> {{$errors->first('tanggal_lahir')}} </td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>
				<select name="agama_id">
					<option>--Silahkan Pilih--</option>
					@foreach($agama as $row)
						<option name="agama_id" value="{{$row->id}}" {{(old('agama_id') == $row->id) ? 'selected' : ''}}>{{$row->agama}}</option>
					@endforeach
				</select>
				{{$errors->first('agama_id')}}
			</td>
		</tr>
		{{csrf_field()}}
		<tr>
			<td></td>
			<td><button type="submit">Submit</button></td>
		</tr>
	</table>
</form>