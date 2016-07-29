<?php

// Standards

Breadcrumbs::register('standards', function($breadcrumbs) {
    $breadcrumbs->push('Standards', route('standards.index'));
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

Breadcrumbs::register('questions', function($breadcrumbs) {
	$breadcrumbs->push('Questions', route('questions.index'));
});

Breadcrumbs::register('question', function($breadcrumbs, $question) {
	$breadcrumbs->parent('questions');
	$breadcrumbs->push($question->title, route('questions.show', $question));
});