@extends('layouts.master')

@section('title', 'Settings')

@section('breadcrumbs', Breadcrumbs::render('account.settings'))

@section('content')

<div class="container">

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body profile">
                <div class="col-xs-12 col-sm-3 text-center user-info">
                    <br />
                    <img class="avatar" src="{{ Gravatar::get($user->email) }}">
                    <br /><br />
                    This site uses <a href="http://en.gravatar.com" target="_blank">Gravatar</a>.
                </div>
                <div class="col-xs-12 col-md-9">
                    {!! Form::model($user, [ 'route' => ['account.update', $user], 'method' => 'PATCH' ]) !!}
                    <div class="col-xs-12">
                        {!! Form::label('name', 'Username', ['class' => 'control-label']) !!}
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12">
                        {!! Form::label('email', 'Email Address', ['class' => 'control-label']) !!}
                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
                        {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        {!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
                        {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12">
                        {!! Form::label('bio', 'Bio', ['class' => 'control-label']) !!}
                        {!! Form::textarea('bio', $user->bio, ['class' => 'form-control', 'rows' => '3']) !!}
                    </div>
                    <div class="col-xs-12">
                        {!! Form::label('location', 'Location', ['class' => 'control-label']) !!}
                        {!! Form::text('location', $user->location, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12">
                        {!! Form::label('birthday', 'Birthday', ['class' => 'control-label']) !!}
                        {!! Form::input('birthday', 'birthday', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-xs-12">
                        <br />
                    </div>
                    <div class="btn-group col-xs-12" data-toggle="buttons" style="display: flex;">
                      <label class="btn btn-primary{{ $user['private'] ? '' : ' active' }}" style="flex: 1;">
                          <input type="radio" name="private" autocomplete="off" value="0" style="flex: 1;"{{ $user['private'] ? '' : ' checked' }}> Make my profile public
                      </label>
                      <label class="btn btn-primary{{ $user['private'] ? ' active' : '' }}" style="flex: 1;">
                          <input type="radio" name="private" autocomplete="off" value="1" style="flex: 1;"{{ $user['private'] ? ' checked' : '' }}> Make my profile private
                      </label>
                    </div>
                    <div class="col-xs-12">
                        <br />
                    </div>
                    <div class="col-xs-12">
                        {!! Form::submit('Update Profile', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
