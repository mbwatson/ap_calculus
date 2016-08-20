<?php

// Admin
///////////////////////////////////////////////////////////////////////////////

Breadcrumbs::register('admin.channels', function($breadcrumbs) {
	$breadcrumbs->push('Admin', route('account.index'));
});

// User
///////////////////////////////////////////////////////////////////////////////

Breadcrumbs::register('users.index', function($breadcrumbs) {
	$breadcrumbs->push('Users', route('users.index'));
});

Breadcrumbs::register('users.show', function($breadcrumbs, $user) {
	$breadcrumbs->parent('users.index');
	$breadcrumbs->push($user->name, route('users.show', $user));
});

// Account
///////////////////////////////////////////////////////////////////////////////

Breadcrumbs::register('account.index', function($breadcrumbs) {
	$breadcrumbs->push('My Account', route('account.index', Auth::user()));
});

Breadcrumbs::register('account.dashboard', function($breadcrumbs) {
	$breadcrumbs->parent('account.index');
	$breadcrumbs->push('Dashboard', route('account.index', Auth::user()));
});

Breadcrumbs::register('account.settings', function($breadcrumbs) {
	$breadcrumbs->parent('account.index');
	$breadcrumbs->push('Settings', route('account.edit', Auth::user()));
});

// Discussions
///////////////////////////////////////////////////////////////////////////////

Breadcrumbs::register('discussions.index', function($breadcrumbs) {
	$breadcrumbs->push('Discussions', route('discussions.index'));
});

Breadcrumbs::register('discussions.index.all', function($breadcrumbs) {
	$breadcrumbs->parent('discussions.index');
	$breadcrumbs->push('All', route('discussions.index'));
});

Breadcrumbs::register('discussions.create', function($breadcrumbs) {
	$breadcrumbs->parent('discussions.index');
	$breadcrumbs->push('Create', route('discussions.create'));
});

Breadcrumbs::register('discussions.edit', function($breadcrumbs, $discussion) {
	$breadcrumbs->parent('discussions.show', $discussion);
	$breadcrumbs->push('Edit', route('discussions.edit', $discussion));
});

Breadcrumbs::register('discussions.channel', function($breadcrumbs, $channel) {
	$breadcrumbs->parent('discussions.index');
	$breadcrumbs->push($channel->name, route('discussions.channel', $channel));
});

Breadcrumbs::register('discussions.show', function($breadcrumbs, $discussion) {
	$breadcrumbs->parent('discussions.channel', $discussion->channel);
	$breadcrumbs->push($discussion->title, route('discussions.show', $discussion));
});

Breadcrumbs::register('discussions.mine', function($breadcrumbs) {
	$breadcrumbs->parent('discussions.index');
	$breadcrumbs->push('My Discussions', route('discussions.mine'));
});

Breadcrumbs::register('discussions.mycontributions', function($breadcrumbs) {
	$breadcrumbs->parent('discussions.index');
	$breadcrumbs->push('Discussions to which I\'ve Contributed', route('discussions.index'));
});

Breadcrumbs::register('discussions.popular', function($breadcrumbs) {
	$breadcrumbs->parent('discussions.index');
	$breadcrumbs->push('Popular', route('discussions.popular'));
});

// Channels
///////////////////////////////////////////////////////////////////////////////

Breadcrumbs::register('channels.index', function($breadcrumbs) {
	$breadcrumbs->push('Channels', route('channels.index'));
});

Breadcrumbs::register('channels.index.all', function($breadcrumbs) {
	$breadcrumbs->parent('channels.index');
	$breadcrumbs->push('All', route('channels.index'));
});

Breadcrumbs::register('channels.create', function($breadcrumbs) {
	$breadcrumbs->parent('channels.index');
	$breadcrumbs->push('Create', route('channels.create'));
});

Breadcrumbs::register('channels.show', function($breadcrumbs, $channel) {
	$breadcrumbs->parent('channels.index');
	$breadcrumbs->push($channel->name, route('channels.show', $channel));
});

Breadcrumbs::register('channels.edit', function($breadcrumbs, $channel) {
	$breadcrumbs->parent('channels.index');
	$breadcrumbs->push('Edit', route('channels.edit', $channel));
});

// Standards
///////////////////////////////////////////////////////////////////////////////

Breadcrumbs::register('standards.index', function($breadcrumbs) {
    $breadcrumbs->push('Curriculum Framework', route('standards.index'));
});

Breadcrumbs::register('mpacs', function($breadcrumbs) {
	$breadcrumbs->parent('standards.index');
	$breadcrumbs->push('MPACs', route('standards.mpacs'));
});

Breadcrumbs::register('big-ideas', function($breadcrumbs) {
	$breadcrumbs->parent('standards.index');
	$breadcrumbs->push('Big Ideas', route('standards.big-ideas'));
});

Breadcrumbs::register('standards.show', function($breadcrumbs, $standard) {
	if ($standard->parent) {
		$breadcrumbs->parent('standards.show', $standard->parent);
	} else {
		$breadcrumbs->parent('standards.index');
		if ($standard->type == "MPAC") {
			$breadcrumbs->push('MPACs', route('standards.mpacs'));
		} else {
			$breadcrumbs->push('Big Ideas', route('standards.big-ideas'));
		}
	}
	$breadcrumbs->push($standard->name, route('standards.show', $standard));
});

// Questions
///////////////////////////////////////////////////////////////////////////////

Breadcrumbs::register('questions.index', function($breadcrumbs) {
	$breadcrumbs->push('Questions', route('questions.index'));
});

Breadcrumbs::register('questions.index.all', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('All', route('questions.index'));
});

Breadcrumbs::register('questions.freeresponse', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('Free Response', route('questions.freeresponse'));
});

Breadcrumbs::register('questions.multiplechoice', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('Multiple Choice', route('questions.multiplechoice'));
});

Breadcrumbs::register('questions.calculator.active', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('Calculator Active', route('questions.calculator.active'));
});

Breadcrumbs::register('questions.calculator.inactive', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('Calculator Inactive', route('questions.calculator.inactive'));
});

Breadcrumbs::register('questions.calculator.neutral', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('Calculator Neutral', route('questions.calculator.neutral'));
});

Breadcrumbs::register('questions.mine', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('My Questions', route('questions.index'));
});

Breadcrumbs::register('questions.mycontributions', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('Questions to which I\'ve Contributed', route('questions.index'));
});

Breadcrumbs::register('questions.favorites', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('My Favorites', route('questions.index'));
});

Breadcrumbs::register('questions.popular', function($breadcrumbs) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push('Popular', route('questions.index'));
});

Breadcrumbs::register('questions.create', function($breadcrumbs) {
    $breadcrumbs->parent('questions.index');
	$breadcrumbs->push('Create', route('questions.create'));
});

Breadcrumbs::register('questions.show', function($breadcrumbs, $question) {
	$breadcrumbs->parent('questions.index');
	$breadcrumbs->push($question->title, route('questions.show', $question));
});

Breadcrumbs::register('questions.edit', function($breadcrumbs, $question) {
    $breadcrumbs->parent('questions.show', $question);
	$breadcrumbs->push('Edit', route('questions.edit', $question));
});

