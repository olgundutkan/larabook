@extends('layouts.default')

@section('content')
<h1>Sign In!</h1>

    <div class="row">
        <div class="col-md-6">
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
    </div>
@stop