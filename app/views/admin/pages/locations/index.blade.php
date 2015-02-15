@extends('layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
    <h1 class="page-header">All Countries</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>Name</th>
                <th class="text-center"></th>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    <tr>
                        <td><a href="{{ route('manage.locations.show', $location->id) }}">{{ e($location->name) }}</a></td>
                        <td>
                            <a href="{{ route('manage.locations.edit', $location->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{ route('manage.locations.destroy', $location->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1>Create New Country</h1>
            {{ Form::open(['route' => 'manage.locations.store', 'class' => '', 'role' => 'form', 'method' => 'POST']) }}
                {{ Form::hidden('parent_id', 0) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name:', ['for' => 'name']) }}
                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Create!', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop