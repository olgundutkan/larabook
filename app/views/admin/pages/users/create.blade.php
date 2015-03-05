@extends('layouts.default')

@section('stylesheet')
@stop

@section('content')
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<h1>Add New User</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'admin.users.store', 'class' => '', 'role' => 'form', 'method' => 'POST']) }}
			
			<div class="form-group">
				{{ Form::label('username', 'Username:', ['for' => 'username']) }}
				{{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('email', 'Email:', ['for' => 'email']) }}
				{{ Form::text('email', null, ['id' => 'email', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password:', ['for' => 'password']) }}
				{{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('password_confirmation', 'Password Confirmation:', ['for' => 'password_confirmation']) }}
				{{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('first_name', 'First Name:', ['for' => 'first_name']) }}
				{{ Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('last_name', 'Last Name:', ['for' => 'last_name']) }}
				{{ Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('gender', 'Gender:', ['for' => 'gender']) }}
				{{ Form::radio('gender', 'not_specified', true) }} Not Specified
				{{ Form::radio('gender', 'male', false) }} Male
				{{ Form::radio('gender', 'female', false) }} Female
			</div>

			<div class="form-group">
				{{ Form::label('dob', 'Date of Birth:', ['for' => 'dob']) }}
				{{ Form::text('dob', null, ['id' => 'dob', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('country', 'Country:', ['for' => 'country']) }}
				{{ Form::select('country', $countries, null, ['id' => 'country', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('state', 'State:', ['for' => 'state']) }}
				{{ Form::select('state', $states, null, ['id' => 'state', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('city', 'City:', ['for' => 'city']) }}
				{{ Form::select('city', $cities, null, ['id' => 'city', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('school_department', 'School / Department:', ['for' => 'school_department']) }}
				{{ Form::text('school_department', null, ['id' => 'school_department', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('is_commercial', 'Is Commercial:', ['for' => 'is_commercial']) }}
				{{ Form::checkbox('is_commercial', true, false, ['id' => 'is_commercial']) }}
			</div>

			<div class="form-group">
				{{ Form::label('language', 'Language:', ['for' => 'language']) }}
				{{ Form::select('language', ['1' => 'English', '2' => 'Turkish'], null, ['id' => 'language', 'class' => 'language']) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Sign Up!', ['class' => 'btn btn-primary']) }}
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop

@section('script')
	<script>
		$(function() {
			$( "#dob" ).datepicker({
				format: 'dd/mm/yyyy'
			});
		});
	</script>
@stop