@extends('admin.layouts.app')

@section('title','Tambah Data Mahasiswa')

@section('content')

<div class="container-fluid">
	<a href="{{route('mahasiswa.index')}}" class="btn btn-default">Back to Home</a><br><br>
	<form class="form-horizontal" action="{{route('mahasiswa.store')}}" method="post">
		<input type="hidden" name="id" value="{{$mahasiswa->id}}">
		<div class="form-group">
			<label class="control-label col-sm-2">First Name </label>
			<div class="col-sm-9"><input class="form-control" type="text" name="first_name" value="{{$mahasiswa->first_name}}"> {{$errors->first('first_name')}} </div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Last Name </label>
			<div class="col-sm-9"><input class="form-control" type="text" name="last_name"  value="{{$mahasiswa->last_name}}"> {{$errors->first('last_name')}} </div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Email</label>
			<div class="col-sm-9"><input class="form-control" type="email" name="email"  value="{{$mahasiswa->email}}"> {{$errors->first('email')}} </div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Old Password</label>
			<div class="col-sm-9"><input class="form-control" type="password" name="old_pass""> {{(Session::has('mahasiswa')) ? Session::get('mahasiswa') : ''}} </div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">New Password</label>
			<div class="col-sm-9"><input class="form-control" type="password" name="password""> {{$errors->first('password')}} </div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Jenis Kelamin</label>
			<div class="col-sm-9 radio">
				<label><input type="radio" name="jenis_kelamin" value="L" {{($mahasiswa->jenis_kelamin == "Laki-laki") ? 'checked' : ''}}> Laki-laki</label>
				<br>
				<label><input type="radio" name="jenis_kelamin" value="P" {{($mahasiswa->jenis_kelamin == "Perempuan") ? 'checked' : ''}}> Perempuan</label> 
				<div class="col-sm-12 row">{{$errors->first('jenis_kelamin')}}</div> 
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Alamat</label>
			<div class="col-sm-9"><textarea class="form-control" rows="3" name="alamat">{{$mahasiswa->alamat}}</textarea>{{$errors->first('alamat')}} </div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Tanggal Lahir</label>
			<div class="col-sm-9">
				<div class="col-sm-3 row">
					<input class="form-control" type="date" name="tanggal_lahir" value="{{$mahasiswa->tanggal_lahir}}"> 
				</div>
				<div class="col-sm-12 row">
					{{$errors->first('tanggal_lahir')}}
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Agama</label>
			<div class="col-sm-9">
				<div class="col-sm-3 row">
					<select name="agama_id" class="form-control">
						<option>--Silahkan Pilih--</option>
						@foreach($agama as $row)
							<option name="agama_id" value="{{$row->id}}" {{($mahasiswa->agama_id == $row->id) ? 'selected' : ''}}>{{$row->agama}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-12 row">
					{{$errors->first('agama_id')}}
				</div>
			</div>
		</div>
		{{ method_field('PUT') }}
		{{csrf_field()}}
		<div class="form-group">
			<label class="control-label col-sm-2"></label>
			<div class="col-sm-9"><button type="submit" class="btn btn-primary">Submit</button></div>
		</div>
	</form>
</div>

@endsection