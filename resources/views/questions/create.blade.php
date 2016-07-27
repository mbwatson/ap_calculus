@extends('layouts.master')

@section('content')

<div class="container">

    <h1>Create a New Question</h1>
    
    <!-- New Question Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::open(['route' => 'questions.store', 'files' => 'true', 'class' => 'question-form']) !!}
            {!! Form::text('title', null, ['class' => 'form-control title', 'placeholder' => 'Enter Title Here']) !!}
            {!! Form::textarea('body', null, ['class' => 'form-control body', 'placeholder' => 'Please add a short title above, type your question here, and choose standards below.']) !!}

            <br />

            Upload Image
            {!! Form::file('image','',array('id'=>'image','class'=>'form-control')) !!}

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
