@extends('layouts.master')

@section('header')
<!-- TinyMCE -->
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#question-textarea',
        plugins: 'advlist autolink image lists charmap',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist| link image',
        menubar: false,
        skin: 'lightgray'
    });
</script>
@endsection

@section('content')
<div class="container">

    <h1>Edit Your Question</h1>
    
    <!-- Edit Question Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($question, [
                'method' => 'PATCH',
                'files' => 'true',
                'route' => ['questions.update', $question->id],
                'class' => 'question-form'
            ]) !!}
            {!! Form::text('title', null, ['class' => 'form-control title']) !!}
            {!! Form::textarea('body', null, ['id' => 'question-textarea', 'class' => 'form-control body']) !!}
            
            <br />

            {!! Form::select('standard_ids[]', $standards->whereIn('type',['MPAC','Learning Objective'])->lists('standard_info','id'), null, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}

            <br /><br />
            
            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>    
</div>
@endsection

@section('footer')
<!-- Select2 list -->
<script type="text/javascript">
    $('#standard_list').select2({
        placeholder: "Choose Standard(s)"
    });
</script>
@endsection