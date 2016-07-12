@extends('layouts.master')

@section('content')

<div class="container">

    @if (Auth::user()->admin)
        <!-- New Tag Form -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add a New Tag
                    </div>
                    <div class="panel-body">
                        <section class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route' => 'tags.store']) !!}
                                <div class="form-group col-md-2" >
                                    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
                                    <select name="parent_id" class="form-control">
                                        <option>Type</option>
                                            <option value="MPAC">MPAC</option>
                                            <option value="Big Idea">Big Idea</option>
                                            <option value="Enduring Understanding">Enduring Understanding</option>
                                            <option value="Learning Objective">Learning Objective</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2" >
                                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-5" >
                                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-2" >
                                    {!! Form::label('parent_id', 'Parent', ['class' => 'control-label']) !!}
                                    <select name="parent_id" class="form-control">
                                        <option>Parent</option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->type . ' ' . $tag->name . ' ' . $tag->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-1" >
                                    <br />
                                    {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <!-- Tags list -->
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mathematical Practices for AP Calculus (MPACs)
                </div>
                <div class="panel-body tags">
                        @foreach ($tags->where('type', 'MPAC') as $tag)
                            <p class="row tag">
                                <div class="col-md-2 name">
                                    <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-xs btn-primary" role="button">MPAC {{ $tag->name }}</a>
                                </div>
                                <div class="col-md-8 description">
                                    {{ $tag->description }}
                                </div>
                            </p>
                        @endforeach
                </div>
                @foreach ($tags->where('type', 'Big Idea') as $bi)
                    <div class="panel-heading">
                        Big Idea {{ $bi->name }}
                    </div>
                    @foreach ($tags->where('parent_id', strval($bi->id))->where('type', 'Enduring Understanding') as $eu)
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    EU {{ $eu->name }} : {{ $eu->description }}
                                </div>
                                <div class="col-md-7">
                                    @foreach ($tags->where('parent_id', strval($eu->id))->where('type', 'Learning Objective') as $lo)
                                        <p>
                                            <a href="{{ route('tags.show', $lo->id) }}" class="btn btn-xs btn-primary" role="button">LO {{ $lo->name }}</a> {{ $lo->description }}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
