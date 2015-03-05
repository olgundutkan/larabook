@extends('frontend.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include ('frontend.pages.statuses.partials.publish-status-form')

            @include ('frontend.pages.statuses.partials.statuses')
        </div>
    </div>
@stop