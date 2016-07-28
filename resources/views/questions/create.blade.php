@extends('layouts.master')

@section('header')
<!-- TinyMCE -->
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: '#question-textarea',
    plugins: 'advlist autolink image lists charmap',
    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist| link image',
    menubar: false,
    relative_urls: false,
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

    <h1>Create a New Question</h1>
    
    <!-- New Question Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'questions.store', 'files' => 'true', 'class' => 'question-form']) !!}
            {!! Form::text('title', null, ['class' => 'form-control title', 'placeholder' => 'Enter Title Here']) !!}
            {!! Form::textarea('body', null, ['id' => 'question-textarea', 'class' => 'form-control body', 'placeholder' => 'Please add a short title above, type your question here, and choose standards below.']) !!}

            <br />

            <div class="form-group">
                {!! Form::select('standards[]', $standards->whereIn('type',['MPAC','Learning Objective'])->lists('standard_info','id'), null, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}
            </div>

            {!! Form::submit('Post Question', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <br />

    <div class="row">
        <div class="col-xs-12">
            <div class="pull-right text-right">
                <a href="#">Help with Markdown</a> <br />
                <a href="#">Help with MathJAX</a>
            </div>
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
