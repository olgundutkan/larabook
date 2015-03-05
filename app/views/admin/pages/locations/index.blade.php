@extends('admin.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
<div class="row">
    <div class="col-md-12"> 
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
                        <td><a href="{{ route('admin.locations.show', $location->id) }}">{{ e($location->name) }}</a></td>
                        <td>
                            <a href="{{ route('admin.locations.edit', $location->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="{{ route('admin.locations.destroy', $location->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@stop