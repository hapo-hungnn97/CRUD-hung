@extends('element.master')
@section('title', 'add')
@section('content')
<h2 class="mt-5">Add Student</h2>
<form action="{{Route('users.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<table class="table w-50 mt-4">
		<tr>
			<th>Full Name</th>
			<td>
				<input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}">
				@if($errors->has('full_name'))
					<small class="text-danger">{{ $errors->first('full_name') }}</small>
				@endif
			</td>
		</tr>
		<tr>
			<th>Address</th>
			<td>
				<input type="text" class="form-control" name="address" value="{{ old('address') }}">
				@if($errors->has('address'))
					<small class="text-danger">{{ $errors->first('address') }}</small>
				@endif
			</td>
		</tr>
		<tr>
			<th>Phone number</th>
			<td>
				<input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
				@if($errors->has('phone_number'))
					<small class="text-danger">{{ $errors->first('phone_number') }}</small>
				@endif
			</td>
		</tr>
		<tr>
			<th>Gender</th>
			<td>
	  			<input class="form-check-input ml-1" type="radio" name="gender" id="1" value="1" {{ old('gender') ==  App\User::GENDER_MALE ? 'checked' : '' }}>
	  			<label for="1" class="ml-4">Male</label>
	  			<input class="form-check-input ml-4" type="radio" name="gender" id="2" value="2" {{ old('gender') ==  App\User::GENDER_FEMALE ? 'checked' : '' }}>
	  			<label for="2" class="ml-5">Female</label>
	  			@if($errors->has('gender'))
	  				<br>
					<small class="text-danger">{{ $errors->first('gender') }}</small>
				@endif
			</td>
		</tr>
		<tr>
			<th>Avatar</th>
			<td>
				<input type="file" class="form-control-file border" name="avatar">
				@if($errors->has('avatar'))
	  				<br>
					<small class="text-danger">{{ $errors->first('avatar') }}</small>
				@endif
			</td>
		</tr>
	</table>
	<div class="mt-5">	
		<button class="btn btn-success">Submit</button>
		<a href="{{ Route('users.index') }}" class="btn btn-info">Return</a>
	</div>
</form>
@endsection
