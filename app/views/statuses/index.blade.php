@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-10">
	{{ Form::open(['route' => 'statuses_path', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}			
		
		<div class="form-group">
			{{ Form::label('status', 'Status:', ['class' => 'col-sm-2 control-label', 'for' => 'status']) }}
			<div class="col-sm-10">
				{{ Form::textarea('status', null, ['class' => 'form-control']) }}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-10 col-offset-2">
				{{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}
			</div>
		</div>
	{{ Form::close() }}
	</div>
</div>
@stop