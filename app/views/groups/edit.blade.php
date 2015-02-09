@extends('layouts.default')

@section('stylesheet')
@stop

@section('content')
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<h1>Edit Group!</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => ['groups.update', $group->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT']) }}
			
			<div class="form-group">
				{{ Form::label('name', 'Group Name:', ['for' => 'name']) }}
				{{ Form::text('name', $group->name, ['id' => 'name', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Update Group!', ['class' => 'btn btn-primary']) }}
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop

@section('script')
@stop