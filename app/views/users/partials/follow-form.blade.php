@if ($signedIn)
    @if ($user->isFollowedBy($currentUser))
        {{ Form::open(['method' => 'DELETE', 'route' => ['follow_path', $user->id]]) }}
            {{ Form::hidden('userIdToUnfollow', $user->id) }}
            <button type="submit" class="btn btn-danger">Unfriend {{ e($user->username) }}</button>
        {{ Form::close() }}
    @else
        {{ Form::open(['route' => 'follows_path']) }}
            {{ Form::hidden('userIdToFollow', $user->id) }}
            <button type="submit" class="btn btn-primary">Add Friend {{ e($user->username) }}</button>
        {{ Form::close() }}
    @endif
@endif