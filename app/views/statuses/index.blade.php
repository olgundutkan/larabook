@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-10">
	{{ Form::open(['route' => 'statuses_path', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}			
		
		<div class="form-group">
			{{ Form::label('body', 'Status:', ['class' => 'col-sm-2 control-label', 'for' => 'status']) }}
			<div class="col-sm-10">
				{{ Form::textarea('body', null, ['class' => 'form-control']) }}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-2 col-md-offset-10">
				{{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}
			</div>
		</div>
	{{ Form::close() }}
	</div>
</div>
<div class="row">
	@foreach($statuses as $status)
		<article>
			{{ e($status->body) }}
		</article>
	@endforeach
</div>
@stop