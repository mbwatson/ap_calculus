@extends('layouts.master')

@section('title', 'Questions / Edit')

@section('breadcrumbs', Breadcrumbs::render('questions.edit', $question))

@section('content')
<div class="container">

    <!-- Edit Question Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($question, [ 'method' => 'PATCH', 'route' => ['questions.update', $question] ]) !!}
                @include('partials.forms.question')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
<!-- TinyMCE -->
<script src='{{ asset('js/tinymce/tinymce.min.js') }}'></script>
<script src='{{ asset('js/tinymce/tinymce_config.js') }}'></script>
<!-- Select2 list -->
<script type="text/javascript">
    $('#standard_list').select2({ placeholder: "Choose Standard(s)" });
</script>
@endsection