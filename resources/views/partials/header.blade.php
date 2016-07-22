<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    AP Calculus
                    <small class="text-info">question forum</small>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                
                <!-- Left Side Of Navbar -->
                
                <ul class="nav navbar-nav">
                    <!-- <li><a href="{{ url('/discussions') }}" ="disabled"><span class="glyphicon glyphicon-comment"></span>Discussions</a></li> -->
                    <li><a href="{{ url('/questions') }}"><span class="glyphicon glyphicon-question-sign"></span>Questions</a></li>
                    <li><a href="{{ url('/standards') }}"><span class="glyphicon glyphicon-tags"></span>Standards</a></li>
<!--                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Standards <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/account') }}"><i class="glyphicon glyphicon-user"></i>Profile</a></li>
                            <li><a href="{{ url('/favorites') }}"><i class="glyphicon glyphicon-heart"></i>Favorites</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
                        </ul>
                    </li>
 -->                    <li><a href="{{ url('/users') }}"><span class="fa fa-btn fa-users"></span>Users</a></li>
                </ul>

                <!-- Search -->

                <div class="hidden-sm col-md-2 col-lg-3 col-lg-offset-1" id="search">
                    {!! Form::open(['route' => ['search.results'], 'class' => 'search-form', 'role' => 'search']) !!}
                    <div class="input-group">
                        {!! Form::text('keywords', null, ['class' => 'form-control', 'placeholder' => 'Search for questions']) !!}
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            
                <!-- Right Side Of Navbar -->
                
                <ul class="nav navbar-nav navbar-right">
                    
                    <!-- Authentication Links -->
                    
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="glyphicon glyphicon-log-in"></i>Login</a></li>
                        <li><a href="{{ url('/register') }}"><i class="glyphicon glyphicon-user"></i>Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img class="avatar" src="{{ url('/') }}/uploads/avatars/{{ Auth::user()->avatar }}">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/account') }}"><i class="glyphicon glyphicon-user"></i>Profile</a></li>
                                <li><a href="{{ url('/favorites') }}"><i class="glyphicon glyphicon-heart"></i>Favorites</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>