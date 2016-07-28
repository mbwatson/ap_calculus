<div class="user-card {{ $user->isOnline() ? 'active' : '' }}">
	<a href="{{ route('users.show', $user) }}">
	    <img class="avatar" src="{{ url('/') }}/avatars/{{ $user->avatar }}"><br />
	    <span class="username">{{ $user->name }}</span>
	</a>
</div>