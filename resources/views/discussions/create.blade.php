@extends('layouts.master')

@section('title', 'Create Discussion')

@section('breadcrumbs', Breadcrumbs::render('discussions.create'))

@section('header')
<!-- TinyMCE -->
<script src='{{ asset('js/tinymce/tinymce.min.js') }}'></script>
<script src='{{ asset('js/tinymce/tinymce_config.js') }}'></script>
@endsection
@section('content')

<div class="container">

    <!-- New Discussion Form -->

    <div class="row" id="discussion">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'discussions.store']) !!}
              @include('partials.forms.discussion')            
            {!! Form::close() !!}
        </div>
    </div>

</div>

@endsection
