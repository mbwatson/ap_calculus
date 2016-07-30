<?php

// Standards

Breadcrumbs::register('standards', function($breadcrumbs) {
    $breadcrumbs->push('Curriculum Framework', route('standards.index'));
});

Breadcrumbs::register('mpacs', function($breadcrumbs) {
	$breadcrumbs->parent('standards');
	$breadcrumbs->push('MPACs', route('standards.mpacs'));
});

Breadcrumbs::register('big-ideas', function($breadcrumbs) {
	$breadcrumbs->parent('standards');
	$breadcrumbs->push('Big Ideas', route('standards.big-ideas'));
});

Breadcrumbs::register('standard', function($breadcrumbs, $standard) {
	if ($standard->parent) {
		$breadcrumbs->parent('standard', $standard->parent);
	} else {
		$breadcrumbs->parent('standards');
		if ($standard->type == "MPAC") {
			$breadcrumbs->push('MPACs', route('standards.mpacs'));
		} else {
			$breadcrumbs->push('Big Ideas', route('standards.big-ideas'));
		}
	}
	$breadcrumbs->push($standard->name, route('standards.show', $standard));
});

// Question

Breadcrumbs::register('questions.index', function($breadcrumbs) {
	$breadcrumbs->push('Questions', route('questions.index'));
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

// User

Breadcrumbs::register('users.index', function($breadcrumbs) {
	$breadcrumbs->push('Users', route('users.index'));
});

Breadcrumbs::register('users.show', function($breadcrumbs, $user) {
	$breadcrumbs->parent('users.index');
	$breadcrumbs->push($user->name, route('users.show', $user));
});

