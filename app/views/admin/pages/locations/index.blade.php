@extends('admin.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')

@include('admin.layouts.partials.errors')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="{{ route('admin.locations.create') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Add New Locations"><i class="fa fa-plus"></i></a>
                </div>
                <!-- panel-btns -->
                <h3 class="panel-title">All Locations</h3>
            </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($locations as $location)
                                <tr>
                                    <td><a href="{{ route('admin.locations.show', $location->id) }}">{{ e($location->name) }}</a></td>
                                    <td>
                                        <a href="{{ route('admin.locations.edit', $location->id) }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.locations.destroy', $location->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash-o"></i></a>
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
@stop