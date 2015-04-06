@extends('admin.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="{{ route('admin.locations.index') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Back"><i class="fa fa-chevron-left"></i></a>
                </div>
                <!-- panel-btns -->
                <h3 class="panel-title">Locations of {{ e($location->name) }}</h3>
            </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($location->children as $child)
                                <tr>
                                    <td>
                                        @if($child->children->count())
                                            <a href="{{ route('admin.locations.show', $child->id) }}">{{ e($child->name) }}</a>
                                        @else
                                        {{ e($child->name) }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.locations.edit', $child->id) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.locations.destroy', $child->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <div class="panel-footer">
                 Footer content goes here...
            </div>
            <!-- panel-footer -->
        </div>
    </div>
</div>

@include('admin.layouts.partials.errors')

<div class="row">
    <div class="col-sm-12">
        {{ Form::open(['route' => 'admin.locations.store', 'id' => 'basicForm', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                </div>
                <!-- panel-btns -->
                <h3 class="panel-title">Add Location</h3>
            </div>
            <div class="panel-body">
                {{ Form::hidden('parent_id', $location->id) }}
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="new_location_name">New Location Name: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::text('new_location_name', null, ['id' => 'new-location-name', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>            
            <div class="panel-footer">
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-10">
                        {{ Form::submit('Create!', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>
            <!-- panel-footer -->
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop