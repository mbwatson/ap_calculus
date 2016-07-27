@extends('layouts.master')

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
            {!! Form::textarea('body', null, ['class' => 'form-control body']) !!}
            
            <br />

            Current Image: 
            @if ($question->image != '')
                <img src="{{ URL::to('uploads/question_images/' . $question->image) }}">
                <a href="{{ route('questions.deleteimage', $question) }}" role="button" class="btn btn-primary btn-xs">Remove Image</a>
                <!-- {{ Form::checkbox('removeimage', 'true') }} Remove Image -->
            @else
                None.
            @endif

            <br /><br />
            Upload Image
            {!! Form::file('image','',array('id' => 'image','class' => 'form-control')) !!}
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