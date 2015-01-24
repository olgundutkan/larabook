@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="error-template">
            <h1>
                Oops!</h1>
            <h2>
                502 Bad Gateway</h2>
            <div class="error-details">
                The web server is returning an unexpected networking error for. <a class="btn btn-default" href="{{ route('home') }}">Take Me To The Homepage</a>
            </div>
        </div>
    </div>
</div>
@stop