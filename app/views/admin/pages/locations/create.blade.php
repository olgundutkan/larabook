@extends('admin.layouts.default')

@section('content')
<div class="row">
<div class="col-lg-12">
{{ Form::open(['route' => 'admin.locations.store', 'role' => 'form', 'method' => 'POST']) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title pull-left">Create New Location</h4>
        <div class="pull-right">
            <a href="{{ route('admin.locations.index') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Group"><i class="glyphicon glyphicon-chevron-left"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        @include('admin.layouts.partials.errors')
        <div class="form-group">
            {{ Form::label('parent-id', 'Parent:', ['for' => 'parent_id']) }}
            {{ Form::select('parent_id', $locations, null, ['id' => 'parent-id', 'class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('new_location_name', 'New Location Name:', ['for' => 'new_location_name']) }}
            {{ Form::text('new_location_name', null, ['id' => 'new-location-name', 'class' => 'form-control']) }}
        </div>
    </div>
    <div class="panel-footer">
        <div class="form-group">
            {{ Form::submit('Create Location!', ['class' => 'btn btn-primary']) }}
        </div>
    </div>
</div>
{{ Form::close() }}
@stop