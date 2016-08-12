@extends('layouts.master')

@section('title', 'Edit Discussion')

@section('breadcrumbs', Breadcrumbs::render('discussions.edit', $discussion))

@section('content')
<div class="container">

    <!-- Discussion Edit Form -->

    <div class="row">
        <div class="col-xs-12" id="discussion">
            {!! Form::model($discussion, [ 'method' => 'PATCH', 'route' => ['discussions.update', $discussion] ]) !!}
              @include('partials.forms.discussion')
            {!! Form::close() !!}
        </div>
    </div>

</div>
@endsection

@section('footer')
<!-- TinyMCE -->
<script src='{{ asset('js/tinymce/tinymce.min.js') }}'></script>
<script src='{{ asset('js/tinymce/tinymce_config.js') }}'></script>
@endsection