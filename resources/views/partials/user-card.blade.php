<div class="user-card {{ $user->isOnline() ? 'active text-success' : '' }}">
	<a href="{{ route('users.show', $user) }}">
	    <img class="avatar" src="{{ url('/') }}/uploads/avatars/{{ $user->avatar }}"><br />
	    <span class="username">{{ $user->name }}</span>
	</a>
</div>