@extends('layouts.master')

@section('content')

<div class="container">
    
    <!-- Edit Question Form -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Question
                </div>
                <div class="panel-body">
                    <section class="row">
                    	<div class="col-md-10 col-md-offset-1">
                            {!! Form::model($question, [
                                'method' => 'PATCH',
                                'route' => ['questions.update', $question->id]
                            ]) !!}
                            <div class="form-group" >
                                {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group" >
                                {!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
                                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                            </div>
                            <div>
                                {!! Form::label('tags', 'Tags', ['class' => 'control-label']) !!}
                                @foreach($tags as $tag)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                                @if ($question->tags->contains($tag))
                                                    checked
                                                @endif
                                            >{{ $tag->name }} : {{ $tag->description }}</input>
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
     		            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
