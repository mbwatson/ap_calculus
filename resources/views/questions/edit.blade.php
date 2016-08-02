@extends('layouts.master')

@section('title', 'Questions / Edit')

@section('breadcrumbs', Breadcrumbs::render('questions.edit', $question))

@section('header')
<!-- TinyMCE -->
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: '#question-textarea',
    plugins: 'advlist autolink image lists charmap preview textpattern',
    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | preview',
    menubar: false,
    relative_urls: false,
    textpattern_patterns: [
      {start: '*', end: '*', format: 'italic'},
      {start: '**', end: '**', format: 'bold'},
      {start: '#', format: 'h1'},
      {start: '##', format: 'h2'},
      {start: '###', format: 'h3'},
      {start: '####', format: 'h4'},
      {start: '#####', format: 'h5'},
      {start: '######', format: 'h6'},
      {start: '1. ', cmd: 'InsertOrderedList'},
      {start: '* ', cmd: 'InsertUnorderedList'},
      {start: '- ', cmd: 'InsertUnorderedList'}
    ],
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
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
                'route' => ['questions.update', $question],
                'class' => 'question-form'
            ]) !!}
            
            <div class="row">
              <div class="btn-group col-md-6" data-toggle="buttons">
                  <label class="btn btn-primary {{ $question->type == 'Free Response' ? 'active' : ''}}">
                      <input type="radio" name="type" autocomplete="off" value="1"  {{ $question->type == 'Free Response' ? 'checked' : ''}}> <span class="fa fa-pencil-square-o"></span> Free Response
                  </label>
                  <label class="btn btn-primary {{ $question->type == 'Multiple Choice' ? 'active' : ''}}">
                      <input type="radio" name="type" autocomplete="off" value="2" {{ $question->type == 'Multiple Choice' ? 'checked' : ''}}> <span class="fa fa-list"></span> Multiple Choice
                  </label>
              </div>
              <div class="btn-group col-md-6" data-toggle="buttons">
                  <label class="btn btn-primary {{ $question->calculator == 'Inactive' ? 'active' : ''}}">
                      <input type="radio" name="calculator" autocomplete="off" value="0" {{ $question->calculator == 'Inactive' ? 'checked' : ''}}> <span class="fa fa-minus"></span> Calculator Inactive
                  </label>
                  <label class="btn btn-primary {{ $question->calculator == 'Active' ? 'active' : ''}}">
                      <input type="radio" name="calculator" autocomplete="off" value="1" {{ $question->calculator == 'Active' ? 'checked' : ''}}> <span class="fa fa-plus"></span> Calculator Active
                  </label>
              </div>
            </div>

            <br />

            {!! Form::text('title', null, ['class' => 'form-control title']) !!}
            {!! Form::textarea('body', null, ['id' => 'question-textarea', 'class' => 'form-control body']) !!}
            
            <br />
            
            {!! Form::select('standard_ids[]', $standards_list, null, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}

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