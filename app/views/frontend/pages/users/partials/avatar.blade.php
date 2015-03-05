<a href="{{ route('profile_path', $user->username) }}">
    <img class="media-object {{ $class or '' }}" src="{{ $user->present()->gravatar(isset($size) ? $size : 30) }}" alt="{{ e($user->username) }}">
</a>