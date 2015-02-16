@extends('layouts.default')

@section('content')
<style type="text/css">
    .right-to-left { margin-top: 30px; }

    .right-to-left li { float: right; }
</style>
<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs right-to-left" role="tablist">
    <li role="presentation"><a href="#terms-conditions" aria-controls="terms-conditions" role="tab" data-toggle="tab">TERMS&CONDITIONS</a></li>    
    <li role="presentation"><a href="#about-us" aria-controls="about-us" role="tab" data-toggle="tab">ABOUT US</a></li>
    <li role="presentation"><a href="#search" aria-controls="search" role="tab" data-toggle="tab">SEARCH</a></li>
    <li role="presentation"><a href="#my-profile" aria-controls="my-profile" role="tab" data-toggle="tab">MY PROFILE</a></li>
    <li role="presentation" class="active"><a href="#main-page" aria-controls="main-page" role="tab" data-toggle="tab">MAIN PAGE</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="main-page">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($groups as $group)
                            <tr>
                                <td>{{ link_to_route('groups.show', e($group->name), [e($group->slug)]) }}</td>
                                <td>
                                    @if($currentUser->inGroup($group->id))
                                        <a href="{{ route('quit_the_group_path', $group->id) }}" data-method="post" data-confirm=""><i class="fa fa-minus-square-o"></i> Quit</a>
                                    @else
                                        <a href="{{ route('join_the_group_path', $group->id) }}" data-method="post" data-confirm=""><i class="fa fa-plus-square-o"></i> Join</a>
                                    @endif
                                    @if($currentUser->isOwner($group->id))
                                        <a href="{{ route('groups.edit', $group->id) }}"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('groups.destroy', $group->id) }}" data-method="delete" data-confirm="Are you sure ?"><i class="fa fa-trash"></i> Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">No group found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel-body">
            @if(isset($currentUser) && $currentUser)
                @forelse($currentUser->groups as $group)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ e($group->name) }}</div>
                            <div class="panel-body">
                                @if ($currentUser->inGroup($group->id))
                                    @include ('groups.partials.publish-status-form')
                                @endif
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="{{ $group->slug }}">
                                      <h4 class="panel-title text-center">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#{{ $group->id }}" aria-expanded="false" aria-controls="{{ $group->id }}">
                                          Show More
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="{{ $group->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{ $group->slug }}">
                                      <div class="panel-body">
                                        @include ('groups.partials.statuses', ['statuses' => $group->statuses])
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No group found</p>
                @endforelse
            @endif
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="my-profile">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel-body">
            @include('layouts.partials.errors')

            {{ Form::model($currentUser, ['route' => ['profile_path.update', $currentUser->username], 'class' => '', 'role' => 'form', 'method' => 'PUT']) }}
                
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
                    {{ Form::text('dob', $currentUser->present()->birthday, ['id' => 'dob', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('country', 'Country:', ['for' => 'country']) }}
                    {{ Form::select('country', $countries, $currentUser->country_id, ['id' => 'country', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('state', 'State:', ['for' => 'state']) }}
                    {{ Form::select('state', $states, $currentUser->state_id, ['id' => 'state', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('city', 'City:', ['for' => 'city']) }}
                    {{ Form::select('city', $cities, $currentUser->city_id, ['id' => 'city', 'class' => 'form-control']) }}
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
                    {{ Form::select('language', ['1' => 'English', '2' => 'Turkish'], $currentUser->language_id, ['id' => 'language', 'class' => 'language']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Update!', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 panel-body">
            <a href="{{ route('profile_path', $currentUser->username) }}">
                <img class="media-object" src="{{ $currentUser->present()->gravatar(150) }}" alt="{{ e($currentUser->username) }}">
            </a>
            <h1 class="media-heading">{{ $currentUser->username }}</h1>
            <ul class="list-inline text-muted">
                <li>{{ e($currentUser->present()->followerCount) }}</li>
                <li>{{ e($currentUser->present()->statusCount) }}</li>                
            </ul>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="search">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-body">
            <h3>Search</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="about-us">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-body">
            <h3>About Us</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="terms-conditions">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-body">
            <h3>Terms&Conditions</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
  </div>

</div>
@stop