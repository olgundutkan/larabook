@extends('layouts.default')

@section('content')
	<div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    		<h1>{{ $page->title }}</h1>
    		<br />
    		{{ $page->content }}
    	</div>
    </div>    
@stop