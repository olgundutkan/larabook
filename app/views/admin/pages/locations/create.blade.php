@extends('admin.layouts.default')

@section('content')

@include('admin.layouts.partials.errors')

<div class="row">
    <div class="col-sm-12">
        {{ Form::open(['route' => 'admin.locations.store', 'id' => 'basicForm', 'class' => 'form-horizontal', 'files' => true, 'role' => 'form', 'method' => 'POST']) }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="{{ route('admin.locations.index') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Back"><i class="fa fa-chevron-left"></i></a>
                </div>
                <!-- panel-btns -->
                <h3 class="panel-title">Add New Locations</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="parent_id">Parent: </label>
                    <div class="col-sm-6">
                        {{ Form::select('parent_id', $locations, null, ['id' => 'parent-id', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="new_location_name">New Location Name: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::text('new_location_name', null, ['id' => 'new-location-name', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <!-- panel-body -->
            <div class="panel-footer">
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-10">
                        {{ Form::submit('Create Location!', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>
            <!-- panel-footer -->
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop