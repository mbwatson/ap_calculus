@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Profile <a class="small pull-right" href="{{ route('account.edit', $user) }}"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                </div>

                <div class="panel-body profile">
                    <div class="col-md-3 user-card">
                        <img class="avatar" src="{{ URL::to('uploads/avatars/' . $user->avatar) }}"><br />
                        {{ $user->name }}
                    </div>
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th><p class="text-right">Username:</p></th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th><p class="text-right">Email:</p></th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th><p class="text-right">First name:</p></th>
                                    <td>{{ $user->first_name }}</td>
                                </tr>
                                <tr>
                                    <th><p class="text-right">Last name:</p></th>
                                    <td>{{ $user->last_name }}</td>
                                </tr>
                                <tr>
                                    <th><p class="text-right">Bio:</p></th>
                                    <td>{{ $user->bio }}</td>
                                </tr>
                                <tr>
                                    <th><p class="text-right">Location:</p></th>
                                    <td>{{ $user->location }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
