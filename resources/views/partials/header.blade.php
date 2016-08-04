<!--

<div class="debugging">
    <span class="visible-xs">XS</span>
    <span class="visible-sm">SM</span>
    <span class="visible-md">MD</span>
    <span class="visible-lg">LG</span>
</div>

-->

<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="row">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <br />
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                    <a class="navbar-brand" href="{{ url('/') }}">
                        <strong>AP Calculus</strong><small class="text-info">question forum</small>
                    </a>

                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    
                    <!-- Search Bar -->
                    
                    <div class="col-sm-4 col-md-6 col-lg-7" id="search">
                        {!! Form::open(['route' => ['search.results'], 'class' => 'search-form', 'role' => 'search']) !!}
                        <div class="input-group">
                            {!! Form::text('keywords', null, ['class' => 'form-control', 'placeholder' => 'Search for questions']) !!}
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    
                    <!-- Authentication Links -->
                    
                    <ul class="nav navbar-nav navbar-right navbar-auth">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}"><i class="glyphicon glyphicon-log-in"></i>Login</a></li>
                            <li><a href="{{ url('/register') }}"><i class="glyphicon glyphicon-user"></i>Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img class="avatar" src="{{ url('/') }}/avatars/{{ Auth::user()->avatar }}">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/account') }}"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                                    <li><a href="{{ route('users.show', Auth::user()) }}"><i class="glyphicon glyphicon-user"></i>My Profile</a></li>
                                    <li><a href="{{ url('/account/'.Auth::user()->id.'/edit') }}"><i class="glyphicon glyphicon-cog"></i>Settings</a></li>
                                    <li><a href="{{ url('/account/notifications') }}"><i class="glyphicon glyphicon-bell"></i>Notifications</a></li>
                                    <li><a href="{{ url('/questions/favorites') }}"><i class="glyphicon glyphicon-heart"></i>Favorites</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    
                    <!-- Main Site Navigation Links -->
                    
                    <div class="col-xs-12 navbar-links">
                        <div class="col-sm-offset-3 ">
                            <ul class="nav navbar-nav">
                                <li class="navbar-link dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="glyphicon glyphicon-tags"></span>Curriculum Framework <span class="caret"></span></a></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="navbar-link"><a href="{{ url('standards') }}"><span class="glyphicon glyphicon-list"></span>Overview</a></li>
                                        <li class="navbar-link"><a href="{{ url('standards/mpacs') }}"><span class="glyphicon glyphicon-check"></span>MPACs</a></li>
                                        <li class="navbar-link"><a href="{{ url('standards/big-ideas') }}"><span class="glyphicon glyphicon-check"></span>Big Ideas</a></li>
                                    </ul>
                                </li>
                                <li class="navbar-link"><a href="{{ url('/questions') }}"><span class="glyphicon glyphicon-question-sign"></span>Questions</a></li>
                                <li class="navbar-link"><a href="{{ url('/discussions') }}"><span class="glyphicon glyphicon-comment"></span>Discussions</a></li>
                                @if (Auth::check() && Auth::user()->admin)
                                    <li class="navbar-link"><a href="{{ url('/channels') }}"><span class="fa fa-television"></span>Channels</a></li>
                                    <li class="navbar-link"><a href="{{ url('/users') }}"><span class="fa fa-btn fa-users"></span>Users</a></li>
                                    <li class="navbar-link"><a href="{{ url('/todo') }}"><span class="fa fa-btn fa-list"></span>To Do List</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
  @yield('breadcrumbs')
</header>