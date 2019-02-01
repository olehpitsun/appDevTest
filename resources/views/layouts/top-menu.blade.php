<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>pp</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>App</b>DEV</span>
    </a>

    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="dropdown messages-menu">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))

                        @endif
                        @else
                            <li class="dropdown messages-menu">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                </ul>
            </ul>
        </div>
    </nav>
</header>
@if (Auth::user()->role == "personal")
    @include('personal.sidebar')
@elseif(Auth::user()->role == "director")
    @include('director.sidebar')
@endif

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">
    @yield('content')
        <!--------------------------
          | Your Page Content Here |
          -------------------------->

    </section>
    <!-- /.content -->
</div>


