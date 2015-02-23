@extends('layouts.default')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Sign In!</h4>
        </div>
        <div class="panel-body">
            {{ Form::open(['route' => 'login_path']) }}
                <!-- Email Form Input -->
                <div class="form-group">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <!-- Password Form Input -->
                <div class="form-group">
                    {{ Form::label('password', 'Password:') }}
                    {{ link_to('password/remind', 'Forgotten Password?', ['class' => 'pull-right']) }}
                    {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <div class="form-group pull-left">
                    <label class="checkbox-inline">
                        {{ Form::checkbox('remember_me', '1', false) }} Remember me
                    </label>
                </div>

                <!-- Sign In Input -->
                <div class="form-group pull-right">
                    {{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
        <div class="panel-footer">
            <div class="form-group pull-right">
                New to Larabook? {{ link_to_route('register_path', 'Sign up') }}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop