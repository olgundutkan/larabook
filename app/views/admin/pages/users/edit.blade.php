@extends('admin.layouts.default')

@section('stylesheet')
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'class' => '', 'role' => 'form', 'files' => true, 'method' => 'PUT']) }}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title pull-left">Edit User Profile</h4>
                    <div class="pull-right">
                        <a href="{{ route('admin.users.index') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Back"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="col-md-8">
                        <div class="form-group">
                            {{ Form::label('username', 'Username:', ['for' => 'username', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control']) }}
                            <span class="help-block">Will be seen at Social Network</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email:', ['for' => 'email', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) }}
                            {{ Form::hidden('is_visible_email', $user->privacy ? $user->privacy->email : false) }}
                            <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_email" data-privacy="true">not be seen</a> at Social Network</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password:', ['for' => 'password', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Password Confirmation:', ['for' => 'password_confirmation', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('title', 'Title:', ['for' => 'title', 'class' => 'control-label']) }}
                            {{ Form::text('title', null, ['id' => 'title', 'class' => 'form-control']) }}
                            {{ Form::hidden('is_visible_title', $user->privacy ? $user->privacy->title : false) }}
                            <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_title" data-privacy="true">not be seen</a> at Social Network</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('first_name', 'First Name:', ['for' => 'first_name', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control']) }}
                            {{ Form::hidden('is_visible_first_name', $user->privacy ? $user->privacy->first_name : false) }}
                            <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_first_name" data-privacy="true">not be seen</a> at Social Network</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('last_name', 'Last Name:', ['for' => 'last_name', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control']) }}
                            {{ Form::hidden('is_visible_last_name', $user->privacy ? $user->privacy->last_name : false) }}
                            <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_last_name" data-privacy="true">not be seen</a> at Social Network</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('gender', 'Gender:', ['for' => 'gender', 'class' => 'control-label']) }}
                            {{ Form::radio('gender', 'not_specified', true) }} Not Specified
                            {{ Form::radio('gender', 'male', false) }} Male
                            {{ Form::radio('gender', 'female', false) }} Female
                            {{ Form::hidden('is_visible_gender', $user->privacy ? $user->privacy->gender : false) }}
                            <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_gender" data-privacy="true">not be seen</a> at Social Network</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('dob', 'Date of Birth:', ['for' => 'dob', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::text('dob', $user->present()->birthday, ['id' => 'dob', 'class' => 'form-control']) }}
                            {{ Form::hidden('is_visible_dob', $user->privacy ? $user->privacy->dob : false) }}
                            <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_dob" data-privacy="true">not be seen</a> at Social Network</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('country', 'Country:', ['for' => 'country', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::select('country', $countries, $user->country_id, ['id' => 'country', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('state', 'State:', ['for' => 'state', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::select('state', $states, $user->state_id, ['id' => 'state', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('city', 'City:', ['for' => 'city', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::select('city', $cities, $user->city_id, ['id' => 'city', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('school_department', 'School / Department:', ['for' => 'school_department', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::text('school_department', null, ['id' => 'school_department', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('is_commercial', 'Is Commercial:', ['for' => 'is_commercial', 'class' => 'control-label']) }}
                            {{ Form::checkbox('is_commercial', true, false, ['id' => 'is_commercial']) }}
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('groups', 'Choose Group:', ['for' => 'groups', 'class' => 'control-label']) }}
                            {{ Form::select('groups[]', $groups, $user->selected_groups, ['id' => 'groups', 'class' => 'form-control', 'multiple'=>'multiple']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('language', 'Language:', ['for' => 'language', 'class' => 'control-label']) }}<span class="req">*</span>
                            {{ Form::select('language', ['1' => 'English', '2' => 'Turkish'], $user->language_id, ['id' => 'language', 'class' => 'form-control']) }}
                        </div>
                        <div class="col-md-9 col-md-offset-3 form-group">
                            {{ Form::file('profile_picture', ['id' => 'profile-profile_picture', 'class' => 'profile-profile_picture']) }}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        {{ Form::submit('Update!', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
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
            $('.privacy').each(function( index ) {
                var input = $(this).data('input');
                var privacy = $(this).data('privacy');
                if ($("input[name="+input+"]").val() > 0) {
                    $("input[name="+input+"]").val(1);
                    $(this).text('be seen');
                    $(this).data('privacy', false);
                } else {
                    $("input[name="+input+"]").val(0);
                    $(this).text('not be seen');
                    $(this).data('privacy', true);
                }
            });
        });
        $('.privacy').click(function() {
            var input = $(this).data('input');
            var privacy = $(this).data('privacy');

            if (privacy) {
                $("input[name="+input+"]").val(1);
                $(this).text('be seen');
                $(this).data('privacy', false);
            } else {                
                $("input[name="+input+"]").val(0);
                $(this).text('not be seen');
                $(this).data('privacy', true);
            }
        });
    </script>
@stop