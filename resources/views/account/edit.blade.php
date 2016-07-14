@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Public Profile
                </div>
                
                <div class="panel-body profile">
                    {!! Form::model($user, [ 'route' => ['account.update', $user], 'method' => 'PATCH' ]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Username', ['class' => 'control-label']) !!}
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email Address', ['class' => 'control-label']) !!}
                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
                        {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
                        {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('bio', 'Bio', ['class' => 'control-label']) !!}
                        {!! Form::textarea('bio', $user->bio, ['class' => 'form-control', 'rows' => '3']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('location', 'Location', ['class' => 'control-label']) !!}
                        {!! Form::text('location', $user->location, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('birthday', 'Birthday', ['class' => 'control-label']) !!}
                        {!! Form::input('date', 'birthday', null, ['class' => 'form-control']) !!}
                    </div>
                    <br />
                    {!! Form::submit('Update Profile', ['class' => 'btn btn-primary btn-sm']) !!}
                    {!! Form::close() !!}
                </div>

                <div class="panel-heading">
                    Avatar
                </div>
                
                <div class="panel-body profile avatar">
                    <div class="col-xs-3">
                        <img class="avatar" src="{{ URL::to('uploads/avatars/' . $user->avatar) }}">
                    </div>
                    <div class="col-xs-7">
                        <form enctype="multipart/form-data" action="/account/update/avatar" method="POST" class="form-inline">
                            <label class="file">Change avatar
                                <input type="file" name="avatar">
                            </label>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <input type="submit" value="Update" class="btn btn-sm btn-primary">
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
