@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="error-template">
            <h1>
                Oops!</h1>
            <h2>
                404 Not Found</h2>
            <div class="error-details">
                Sorry, an error has occured, Requested page not found! <a class="btn btn-default" href="{{ route('home') }}">Take Me To The Homepage</a>
            </div>
        </div>
    </div>
</div>
@stop