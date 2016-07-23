@extends('layouts.master')

@section('content')

<div class="container">

    <h1>Edit Your Question</h1>
    
    <!-- Edit Question Form -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($question, [
                'method' => 'PATCH',
                'route' => ['questions.update', $question->id],
                'class' => 'question-form'
            ]) !!}
            {!! Form::text('title', null, ['class' => 'form-control title']) !!}
            {!! Form::textarea('body', null, ['class' => 'form-control body']) !!}
            
            <br />

            {!! Form::select('standard_ids[]', $standards->whereIn('type',['MPAC','Learning Objective'])->lists('standard_info','id'), null, ['id' => 'standard_list', 'class' => 'form-control', 'multiple']) !!}
            {!! Form::submit('Update Question', ['class' => 'btn btn-primary btn-block']) !!}
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