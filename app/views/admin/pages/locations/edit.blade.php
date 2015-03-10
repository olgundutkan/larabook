@extends('admin.layouts.default')

@section('content')
<div class="row">
<div class="col-lg-12">
{{ Form::open(['route' => ['admin.locations.update', $location->id], 'class' => '', 'role' => 'form', 'method' => 'PUT']) }}
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title pull-left">Edit Location</h4>
        <div class="pull-right">
            <a href="{{ route('admin.locations.index') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Group"><i class="glyphicon glyphicon-chevron-left"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        @include('admin.layouts.partials.errors')
        <div class="form-group">
            {{ Form::label('parent-id', 'Parent:', ['for' => 'parent_id']) }}
            {{ Form::select('parent_id', $locations, $location->parent_id, ['id' => 'parent-id', 'class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('location_name', 'Location Name:', ['for' => 'location_name']) }}
            {{ Form::text('location_name', $location->name, ['id' => 'new-location-name', 'class' => 'form-control']) }}
        </div>
    </div>
    <div class="panel-footer">
        <div class="form-group">
            {{ Form::submit('Update Location!', ['class' => 'btn btn-primary']) }}
        </div>
    </div>
</div>
{{ Form::close() }}
@stop