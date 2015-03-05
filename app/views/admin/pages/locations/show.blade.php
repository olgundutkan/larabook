@extends('layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
    <h1 class="page-header">Locations of {{ e($location->name) }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th>Name</th>
                <th class="text-center"></th>
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
                            <a href="{{ route('admin.locations.edit', $child->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{ route('admin.locations.destroy', $child->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1>Create New Location</h1>
            {{ Form::open(['route' => 'admin.locations.store', 'class' => '', 'role' => 'form', 'method' => 'POST']) }}
                {{ Form::hidden('parent_id', $location->id) }}
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