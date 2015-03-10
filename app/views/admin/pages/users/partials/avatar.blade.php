<a href="{{ route('profile_path', $user->username) }}">
    <img class="media-object {{ $class or '' }}" src="{{ $currentUser->present()->profilePicture(isset($size) ? $size : 'medium') }}" alt="{{ e($user->username) }}">
</a>