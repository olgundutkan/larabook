<div class="form-group">
    {{ Form::label('email', 'Email:', ['for' => 'email', 'class' => 'control-label']) }}
    {{ e($user->email) }}
</div>

<div class="form-group">
    {{ Form::label('title', 'Title:', ['for' => 'title', 'class' => 'control-label']) }}
    {{ e($user->title) }}
</div>

<div class="form-group">
    {{ Form::label('first_name', 'First Name:', ['for' => 'first_name', 'class' => 'control-label']) }}
    {{ e($user->first_name) }}
</div>

<div class="form-group">
    {{ Form::label('last_name', 'Last Name:', ['for' => 'last_name', 'class' => 'control-label']) }}
    {{ e($user->last_name) }}
</div>

<div class="form-group">
    {{ Form::label('gender', 'Gender:', ['for' => 'gender', 'class' => 'control-label']) }}
    {{ e($user->gender) }}
</div>

<div class="form-group">
    {{ Form::label('dob', 'Date of Birth:', ['for' => 'dob', 'class' => 'control-label']) }}
    {{ e($user->present()->birthday) }}
</div>

<div class="form-group">
    {{ Form::label('country', 'Country:', ['for' => 'country', 'class' => 'control-label']) }}
    {{ e($user->country->name) }}
</div>

<div class="form-group">
    {{ Form::label('state', 'State:', ['for' => 'state', 'class' => 'control-label']) }}
    {{ e($user->state->name) }}
</div>

<div class="form-group">
    {{ Form::label('city', 'City:', ['for' => 'city', 'class' => 'control-label']) }}
    {{ e($user->city->name) }}
</div>

<div class="form-group">
    {{ Form::label('school_department', 'School / Department:', ['for' => 'school_department', 'class' => 'control-label']) }}
    {{ e($user->school_department) }}
</div>

<div class="form-group">
    {{ Form::label('is_commercial', 'Is Commercial:', ['for' => 'is_commercial', 'class' => 'control-label']) }}
    {{ e($user->is_commercial ? 'Yes' : 'No') }}
</div>

<div class="form-group">
    {{ Form::label('groups', 'Choose Group:', ['for' => 'groups', 'class' => 'control-label']) }}
    <ul class="list-inline">
        @foreach($user->groups as $group)
            <li>{{ $group->name }}</li>
        @endforeach
    </ul>
</div>

<div class="form-group">
    {{ Form::label('language', 'Language:', ['for' => 'language', 'class' => 'control-label']) }}
    {{ e($user->language_id) }}
</div>