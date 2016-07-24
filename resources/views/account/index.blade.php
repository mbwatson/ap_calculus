@extends('layouts.master')

@section('content')

<div class="container">

    <h1>My Profile</h1>

    <!-- Profile -->

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body profile">
                    <div class="col-sm-3 user-card">
                        <img class="avatar" src="{{ URL::to('uploads/avatars/' . $user->avatar) }}"><br />
                        {{ $user->name }}
                    </div>
                    <div class="col-sm-9">
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
                                <tr>
                                    <th><p class="text-right">Favorites:</p></th>
                                    <td>{{ $user->favorites->count() }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <!-- Edit Lnk -->
                    <a href="{{ route('account.edit', $user) }}" role="button" class="btn btn-sm btn-link"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
