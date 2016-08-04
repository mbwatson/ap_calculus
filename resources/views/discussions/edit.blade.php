@extends('layouts.master')

@section('title', 'Edit Discussion')

@section('breadcrumbs', Breadcrumbs::render('discussions.edit', $discussion))

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
      {start: '1. ', cmd: 'InsertOrderedList'},,
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

    <!-- Discussion Edit Form -->

    <div class="row">
        <div class="col-xs-12" id="discussion">
            {!! Form::model($discussion, [
                'method' => 'PATCH',
                'route' => ['discussions.update', $discussion]
            ]) !!}

            {!! Form::text('title', null, ['class' => 'form-control form-title', 'placeholder' => 'Enter Title Here']) !!}

            <div class="form-group" style="background-color: #000; padding: 1em; color: #fff;">
                <div class="row">
                    <label for="channel_id" class="col-xs-3" style="font-weight: bold;">DISCUSSIONS / </label>
                    <div class="col-xs-8">
                        {!! Form::select('channel_id', $channels_list, null, ['placeholder' => 'Channel', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-2 text-center">
                        <div class="{{ Auth::user()->isOnline() ? 'active-' : '' }}user text-center">
                            <img class="avatar" src="{{ url('/') }}/avatars/{{ Auth::user()->avatar }}"><br />
                            <span class="username">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                    <div class="col-xs-10">
                        {!! Form::textarea('body', null, ['id' => 'discussion-textarea', 'class' => 'form-control body']) !!}
                    </div>
                </div>
            </div>

            <br />

            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>

</div>
@endsection
