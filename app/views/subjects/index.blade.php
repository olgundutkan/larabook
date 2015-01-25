@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include ('subjects.partials.create-new-subject-form')

            @include ('subjects.partials.subjects')
        </div>
    </div>
@stop