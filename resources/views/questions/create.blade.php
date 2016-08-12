@extends('layouts.master')

@section('title', 'Questions / Create')

@section('breadcrumbs', Breadcrumbs::render('questions.create'))

@section('header')
<!-- TinyMCE -->
<script src='{{ asset('js/tinymce/tinymce.min.js') }}'></script>
<script src='{{ asset('js/tinymce/tinymce_config.js') }}'></script>
@endsection

@section('content')
<div class="container">

    <!-- New Question Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'questions.store']) !!}
                @include('partials.forms.question')
            {!! Form::close() !!}
        </div>
    </div>

    <br />

    <div class="row">
        <div class="col-xs-12">
            <div class="pull-right text-right">
                <a href="#">Help with $\LaTeX$</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<!-- Select2 list -->
<script type="text/javascript">
    $('#standard_list').select2({ placeholder: "Choose Standard(s)" });
</script>
@endsection
