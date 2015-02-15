@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<h1>Update Role!</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => ['manage.roles.update', $role->id], 'class' => '', 'role' => 'form', 'method' => 'PUT']) }}
			
			<div class="form-group">
				{{ Form::label('name', 'Name:', ['for' => 'name']) }}
				{{ Form::text('name', e($role->name), ['id' => 'name', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Description:', ['for' => 'description']) }}
				{{ Form::textarea('description', e($role->description), ['id' => 'description', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Update!', ['class' => 'btn btn-primary']) }}
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop