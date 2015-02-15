@extends('layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1>Edit Location</h1>
            {{ Form::open(['route' => ['manage.locations.update', $location->id], 'class' => '', 'role' => 'form', 'method' => 'PUT']) }}
                <div class="form-group">
                    {{ Form::label('parent_id', 'Parent:', ['for' => 'parent_id']) }}
                    {{ Form::select('parent_id', $parents, $location->parent_id, ['id' => 'parent_id', 'class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('name', 'Name:', ['for' => 'name']) }}
                    {{ Form::text('name', $location->name, ['id' => 'name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Update!', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop