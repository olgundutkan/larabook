@extends('admin.layouts.default')

@section('content')
<div class="row">
<div class="col-lg-12">
{{ Form::open(['route' => 'admin.languages.store', 'role' => 'form', 'method' => 'POST']) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title pull-left">Languages</h4>
        <div class="pull-right">
            <a href="{{ route('admin.languages.index') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Language"><i class="glyphicon glyphicon-chevron-left"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
    	@include('admin.layouts.partials.errors')

    	<div class="form-group">
			{{ Form::label('name', 'Language Name:', ['for' => 'name']) }}
			{{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('slug', 'Slug:', ['for' => 'slug']) }}
			{{ Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control']) }}
		</div>
    </div>
    <div class="panel-footer">
        <div class="form-group">
			{{ Form::submit('Create Language!', ['class' => 'btn btn-primary']) }}
		</div>
    </div>
</div>
{{ Form::close() }}
@stop

@section('script')
@stop