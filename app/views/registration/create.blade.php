@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<h1>Register!</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'register_path', 'class' => '', 'role' => 'form', 'method' => 'POST']) }}
			
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
				{{ Form::submit('Sign Up!', ['class' => 'btn btn-primary']) }}
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop