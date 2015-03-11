@extends('frontend.layouts.default')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-param" content="_token" />
@stop

@section('content')
<style type="text/css">
    .right-to-left { margin-top: 30px; }

    .right-to-left li { float: right; }
</style>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Groups!
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <h4>Groups By Populatios</h4>
                    <div style="display:flex">
                      <div class="form-group">
                        <label for="country">Country</label>
                        {{ Form::select('country', $countries, null,['class' =>'country', 'style' => 'max-width:70px;']) }}
                      </div>
                      <div class="form-group">
                        <label for="state">State</label>
                        {{ Form::select('state', $states, null,['style' => 'max-width:70px;']) }}
                      </div>
                      <div class="form-group">
                        <label for="city">City</label>
                        {{ Form::select('city', $cities, null,['style' => 'max-width:70px;']) }}
                      </div>
                      </div>
                      <div class="form-group">
                        <ul>
                            @forelse($groups as $group)
                                <li>{{ link_to_route('groups.show', e($group->name), [e($group->slug)]) }} ( {{ $group->users->count() }} )</li>
                            @empty
                                <li>No group found</li>
                            @endforelse
                        </ul>
                      </div>
                       <hr>
                      <h4>Most Active Group</h4>
                      <div style="display:flex">
                      <div class="form-group">
                        <label for="country">Country</label>
                        {{ Form::select('country', [], null,['style' => 'max-with:30px;']) }}
                      </div>
                      <div class="form-group">
                        <label for="city">City</label>
                        {{ Form::select('city', [], null,['style' => 'max-with:30px;']) }}
                      </div>
                      <div class="form-group">
                        <label for="state">State</label>
                        {{ Form::select('state', [], null,['style' => 'max-with:30px;']) }}
                      </div>
                      </div>
                      <div class="form-group">
                        <ul>
                            @forelse($groups as $group)
                                <li>{{ link_to_route('groups.show', e($group->name), [e($group->slug)]) }} ( {{ $group->users->count() }} )</li>
                            @empty
                                <li>No group found</li>
                            @endforelse
                        </ul>
                      </div>
                      <hr>
                      <h4>Groups By Index (a-z)</h4>
                      <div style="display:flex">
                      <div class="form-group">
                        <label for="country">Country</label>
                        {{ Form::select('country', [], null,['style' => 'max-with:30px;']) }}
                      </div>
                      <div class="form-group">
                        <label for="city">City</label>
                        {{ Form::select('city', [], null,['style' => 'max-with:30px;']) }}
                      </div>
                      <div class="form-group">
                        <label for="state">State</label>
                        {{ Form::select('state', [], null,['style' => 'max-with:30px;']) }}
                      </div>
                      </div>
                      <div class="form-group">
                        <ul>
                            @forelse($groups as $group)
                                <li>{{ link_to_route('groups.show', e($group->name), [e($group->slug)]) }} ( {{ $group->users->count() }} )</li>
                            @empty
                                <li>No group found</li>
                            @endforelse
                        </ul>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6">
        @if(isset($currentUser) && $currentUser)
            @if($currentUser->groups->count())
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($currentUser->groups as $group)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading-{{ $group->id }}">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $group->id }}" aria-expanded="true" aria-controls="collapse-{{ $group->id }}">
                            {{ e($group->name) }} </a>
                            </h4>
                        </div>
                        <div id="collapse-{{ $group->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-{{ $group->id }}">
                            <div class="panel-body status-body">
                                @if ($currentUser->inGroup($group->id))
                                    @include ('frontend.pages.groups.partials.publish-status-form')
                                @endif
                            </div>
                            @include ('frontend.pages.groups.partials.statuses', ['statuses' => $group->statuses])
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p>No group found</p>
            @endif
        @endif
    </div>
    <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
        <div class="panel panel-default">
            @if(isset($currentUser) && $currentUser)
            <div class="panel-body">
                <div class="col-md-12 text-center">
                    <a href="{{ route('profile_path', e($currentUser->username), $currentUser->username) }}">
                        <img src="{{ e($currentUser->present()->profilePicture('medium')) }}" class="img-responsive" alt="{{ $currentUser->username }}" style="margin:0 auto;">
                    </a>
                </div>                
                <h4 class="text-center">{{ link_to_route('profile_path', e($currentUser->username), $currentUser->username) }}</h4>
                <div class="col-md-4 text-center">
                    {{ e($currentUser->present()->followerCount) }}
                </div>
                <div class="col-md-4 text-center">
                    {{ e($currentUser->present()->statusCount) }}
                </div>
                <div class="col-md-4 text-center">
                </div>
            </div>
            @endif
        </div>
        <div class="panel panel-default">
            @if(isset($currentUser) && $currentUser)
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">{{ link_to('about-us', 'About Us') }}</li>
                    <li class="list-group-item">{{ link_to('terms-conditioins', 'Terms & Conditioins') }}</li> 
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery('.country').change(function() {
    //console.log($(this).val());
    jQuery.post( "{{ route('locations.get_child_list') }}", { _token: '{{ csrf_token() }}', id: jQuery(this).val() } )
    .done(function(data) {
      console.log(data);
        jQuery(this).append(jQuery("<option></option>").attr("value", '').text('Please select'));
        jQuery.map(data, function( id, name ) {
          console.log(id);
            //$(this).append($("<option></option>").attr("value", id).text(name)); 
        });
    })
    .fail(function(data) {
      console.log(data);
    })
    .always(function() {
      alert( "finished" );
    });
    
  });
});
</script>
@stop