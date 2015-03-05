@extends('admin.layouts.default')

@section('stylesheet')
@stop

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <h1>User Edit</h1>

        @include('admin.layouts.partials.errors')

        {{ Form::model($user, ['route' => ['admin.users.update', $user->username], 'class' => '', 'role' => 'form', 'method' => 'PUT']) }}
            
            <div class="form-group">
                {{ Form::label('username', 'Username:', ['for' => 'username']) }}
                {{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email:', ['for' => 'email']) }}
                {{ Form::text('email', null, ['id' => 'email', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('first_name', 'First Name:', ['for' => 'first_name']) }}
                {{ Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('last_name', 'Last Name:', ['for' => 'last_name']) }}
                {{ Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('gender', 'Gender:', ['for' => 'gender']) }}
                {{ Form::radio('gender', 'not_specified', true) }} Not Specified
                {{ Form::radio('gender', 'male', false) }} Male
                {{ Form::radio('gender', 'female', false) }} Female
            </div>

            <div class="form-group">
                {{ Form::label('dob', 'Date of Birth:', ['for' => 'dob']) }}
                {{ Form::text('dob', $user->present()->birthday, ['id' => 'dob', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('country', 'Country:', ['for' => 'country']) }}
                {{ Form::select('country', $countries, $user->country_id, ['id' => 'country', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('state', 'State:', ['for' => 'state']) }}
                {{ Form::select('state', $states, $user->state_id, ['id' => 'state', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('city', 'City:', ['for' => 'city']) }}
                {{ Form::select('city', $cities, $user->city_id, ['id' => 'city', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('school_department', 'School / Department:', ['for' => 'school_department']) }}
                {{ Form::text('school_department', null, ['id' => 'school_department', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('is_commercial', 'Is Commercial:', ['for' => 'is_commercial']) }}
                {{ Form::checkbox('is_commercial', true, false, ['id' => 'is_commercial']) }}
            </div>

            <div class="form-group">
                {{ Form::label('language', 'Language:', ['for' => 'language']) }}
                {{ Form::select('language', ['1' => 'English', '2' => 'Turkish'], $user->language_id, ['id' => 'language', 'class' => 'language']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Sign Up!', ['class' => 'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop

@section('script')
    <script>
        $(function() {
            $( "#dob" ).datepicker({
                format: 'dd/mm/yyyy'
            });
        });
    </script>
@stop