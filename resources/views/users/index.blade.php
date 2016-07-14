@extends('layouts.master')

@section('content')

<!-- User List -->

<div class="container">

    <header>Users</header>

    <!-- Users List -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach($users as $user)
                        <div class="col-xs-12 col-sm-2">
                            @include('partials.user-card', ['user' => $user])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
