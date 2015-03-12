@unless(!$user->privacy->email)
    <div class="form-group">
        {{ Form::label('email', 'Email:', ['for' => 'email', 'class' => 'control-label']) }}
        {{ e($user->email) }}
    </div>
@endunless

@unless(!$user->privacy->title)
<div class="form-group">
    {{ Form::label('title', 'Title:', ['for' => 'title', 'class' => 'control-label']) }}
    {{ e(!$user->title) }}
</div>
@endunless

@unless(!$user->privacy->first_name)
<div class="form-group">
    {{ Form::label('first_name', 'First Name:', ['for' => 'first_name', 'class' => 'control-label']) }}
    {{ e(!$user->first_name) }}
</div>
@endunless

@unless(!$user->privacy->last_name)
<div class="form-group">
    {{ Form::label('last_name', 'Last Name:', ['for' => 'last_name', 'class' => 'control-label']) }}
    {{ e(!$user->last_name) }}
</div>
@endunless

@unless(!$user->privacy->gender)
<div class="form-group">
    {{ Form::label('gender', 'Gender:', ['for' => 'gender', 'class' => 'control-label']) }}
    {{ e(!$user->gender) }}
</div>
@endunless

@unless(!$user->privacy->dob)
<div class="form-group">
    {{ Form::label('dob', 'Date of Birth:', ['for' => 'dob', 'class' => 'control-label']) }}
    {{ e($user->present()->birthday) }}
</div>
@endunless

@unless(!$user->country)
<div class="form-group">
    {{ Form::label('country', 'Country:', ['for' => 'country', 'class' => 'control-label']) }}
    {{ e($user->country->name) }}
</div>
@endunless

@unless(!$user->state)
<div class="form-group">
    {{ Form::label('state', 'State:', ['for' => 'state', 'class' => 'control-label']) }}
    {{ e($user->state->name) }}
</div>
@endunless

@unless(!$user->city)
<div class="form-group">
    {{ Form::label('city', 'City:', ['for' => 'city', 'class' => 'control-label']) }}
    {{ e($user->city->name) }}
</div>
@endunless

@unless(empty($user->school_department))
<div class="form-group">
    {{ Form::label('school_department', 'School / Department:', ['for' => 'school_department', 'class' => 'control-label']) }}
    {{ e($user->school_department) }}
</div>
@endunless

@unless(!$user->is_commercial)
<div class="form-group">
    {{ Form::label('is_commercial', 'Is Commercial:', ['for' => 'is_commercial', 'class' => 'control-label']) }}
    {{ e($user->is_commercial ? 'Yes' : 'No') }}
</div>
@endunless

@unless(!$user->groups->count())
<div class="form-group">
    {{ Form::label('groups', 'Choose Group:', ['for' => 'groups', 'class' => 'control-label']) }}
    <ul class="list-inline">
        @foreach($user->groups as $group)
            <li>{{ $group->name }}</li>
        @endforeach
    </ul>
</div>
@endunless

@unless(!$user->language_id)
<div class="form-group">
    {{ Form::label('language', 'Language:', ['for' => 'language', 'class' => 'control-label']) }}
    {{ e($user->language_id) }}
</div>
@endunless