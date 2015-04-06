@extends('admin.layouts.default')

@section('stylesheet')
@stop

@section('content')

@include('admin.layouts.partials.errors')

<div class="row">
    <div class="col-sm-12">
        {{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'id' => 'basicForm', 'class' => 'form-horizontal', 'role' => 'form', 'files' => true, 'method' => 'PUT']) }}
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="{{ route('admin.users.index') }}" type="button" class="btn btn-default tooltips" data-toggle="tooltip" data-placement="top" title="Back"><i class="fa fa-chevron-left"></i></a>
                </div>
                <!-- panel-btns -->
                <h3 class="panel-title">Edit User</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="username">Username: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::text('username', null, ['id' => 'username', 'class' => 'form-control']) }}
                        <span class="help-block">Will be seen at Social Network</span>
                    </div>                  
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="email">Email: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) }}
                        {{ Form::hidden('is_visible_email', $user->privacy ? $user->privacy->email : false) }}
                        <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_email" data-privacy="true">not be seen</a> at Social Network</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="password">Password: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="password_confirmation">Password Confirmation: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="title">Title:</label>
                    <div class="col-sm-6">
                        {{ Form::text('title', null, ['id' => 'title', 'class' => 'form-control']) }}
                        {{ Form::hidden('is_visible_title', $user->privacy ? $user->privacy->title : false) }}
                        <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_title" data-privacy="true">not be seen</a> at Social Network</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="first_name">First Name: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control']) }}
                        {{ Form::hidden('is_visible_first_name', $user->privacy ? $user->privacy->first_name : false) }}
                        <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_first_name" data-privacy="true">not be seen</a> at Social Network</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="last_name">Last Name: <span class="asterisk">*</span></label>
                    <div class="col-sm-6">
                        {{ Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control']) }}
                        {{ Form::hidden('is_visible_last_name', $user->privacy ? $user->privacy->last_name : false) }}
                        <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_last_name" data-privacy="true">not be seen</a> at Social Network</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="gender">Gender:</label>
                    <div class="col-sm-6">
                        {{ Form::radio('gender', 'not_specified', true) }} Not Specified
                        {{ Form::radio('gender', 'male', false) }} Male
                        {{ Form::radio('gender', 'female', false) }} Female
                        {{ Form::hidden('is_visible_gender', $user->privacy ? $user->privacy->gender : false) }}
                        <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_gender" data-privacy="true">not be seen</a> at Social Network</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="dob">Date of Birth:</label>
                    <div class="col-sm-6">
                        {{ Form::text('dob', null, ['id' => 'dob', 'class' => 'form-control']) }}
                        {{ Form::hidden('is_visible_dob', $user->privacy ? $user->privacy->dob : false) }}
                        <span class="help-block">Will <a href="javascript:void(0)" class="privacy" data-input="is_visible_dob" data-privacy="true">not be seen</a> at Social Network</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="country">Country:</label>
                    <div class="col-sm-6">
                        {{ Form::select('country', $countries, $user->country_id, ['id' => 'country', 'class' => 'form-control']) }}
                        <span class="help-block">Will be seen at Social Network</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="state">State:</label>
                    <div class="col-sm-6">
                        {{ Form::select('state', $states, $user->state_id, ['id' => 'state', 'class' => 'form-control']) }}
                        <span class="help-block">Will be seen at Social Network</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="city">City:</label>
                    <div class="col-sm-6">
                        {{ Form::select('city', $cities, $user->city_id, ['id' => 'city', 'class' => 'form-control']) }}
                        <span class="help-block">Will be seen at Social Network</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="school_department">School / Department:</label>
                    <div class="col-sm-6">
                        {{ Form::text('school_department', null, ['id' => 'school_department', 'class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="is_commercial">Is Commercial:</label>
                    <div class="col-sm-6">
                        {{ Form::checkbox('is_commercial', true, false, ['id' => 'is_commercial']) }}
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="groups">Choose Group:</label>
                    <div class="col-sm-6">
                        {{ Form::select('groups[]', $groups, $user->selected_groups, ['id' => 'groups', 'class' => 'form-control chosen-select', 'multiple'=>'multiple']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="language">Language:</label>
                    <div class="col-sm-6">
                        {{ Form::select('language', ['1' => 'English', '2' => 'Turkish'], $user->language_id, ['id' => 'language', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="profile_picture">Profile Picture:</label>
                    {{ Form::file('profile_picture', ['id' => 'profile_picture', 'class' => 'profile_picture']) }}
                </div>
            </div>
            <!-- panel-body -->
            <div class="panel-footer">
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-10">
                        {{ Form::submit('Update!', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>
            <!-- panel-footer -->
        </div>
        <!-- panel -->
        {{ Form::close() }}
    </div>
    <!-- col-sm-12 -->
</div>
<!-- row -->

@stop

@section('script')
    <script>
        $(function() {
            jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});

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