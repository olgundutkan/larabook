<a href="{{ route('profile_path', $currentUser->username ? e($currentUser->username) : $currentUser->id) }}">
    <img class="media-object {{ $class or '' }}" src="{{ $user->present()->profilePicture(isset($size) ? $size : 'medium') }}" alt="{{ e($user->username) }}">
</a>