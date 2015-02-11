@extends('layouts.default')

@section('stylesheet')
@stop

@section('content')
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<h1>Create New Group!</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'groups.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}
			
			<div class="form-group">
				{{ Form::label('name', 'Group Name:', ['for' => 'name']) }}
				{{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('slug', 'Slug:', ['for' => 'slug']) }}
				{{ Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Create Group!', ['class' => 'btn btn-primary']) }}
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
    jQuery(document).ready(function(){
        $("#name").slugger({
            slugInput: $("#slug")
        });
    });
</script>
@stop