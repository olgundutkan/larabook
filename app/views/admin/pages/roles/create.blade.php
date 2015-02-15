@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<h1>Create Role!</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'manage.roles.store', 'class' => '', 'role' => 'form', 'method' => 'POST']) }}
			
			<div class="form-group">
				{{ Form::label('name', 'Name:', ['for' => 'name']) }}
				{{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Description:', ['for' => 'description']) }}
				{{ Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Register!', ['class' => 'btn btn-primary']) }}
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop