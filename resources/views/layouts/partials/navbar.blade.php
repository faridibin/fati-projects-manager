<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <em class="fas fa-bars"></em>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <router-link :to="{ 'name': 'dashboard'}" class="nav-link">Dashboard</router-link>
                    </li>
                    {{-- <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" id="nav-dropdown-2">Pages</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="pages-app.html">App Pages</a>
                                <a class="dropdown-item" href="pages-utility.html">Utility Pages</a>
                                <a class="dropdown-item" href="pages-layouts.html">Layouts</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" id="nav-dropdown-3">Components</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>
                                <a class="dropdown-item" href="components-pipeline.html">Pipeline</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="documentation/index.html">Documentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="documentation/changelog.html">Changelog</a>
                    </li> --}}
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    {{-- <form id="searchNavbar" class="form-inline my-lg-0 my-2">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <em class="fas fa-search"></em>
                                </span>
                            </div>
                            <input type="search" class="form-control form-control-sm" placeholder="Search" aria-label="Search app">
                        </div>
                    </form>
                    <li class="nav-item dropdown mx-lg-2">
                        <a id="addNewDropdown" class="btn btn-primary btn-sm btn-block dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Add New
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="addNewDropdown">
                            <a class="dropdown-item" href="#">Team</a>
                            <a class="dropdown-item" href="#">Project</a>
                            <a class="dropdown-item" href="#">Task</a>
                        </div>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a id="profileDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{-- <img alt="Image" src="assets/img/avatar-male-4.jpg" class="avatar" /> --}}
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                            {{-- Overview --}}
                            <router-link :to="{ 'name': 'settings.profile'}" class="dropdown-item">Account Settings</router-link>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();window.localStorage.clear();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


{{-- <div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="index.html">
    <img alt="Pipeline" src="assets/img/logo.svg" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-block d-lg-none ml-2">
            <div class="dropdown">
                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img alt="Image" src="assets/img/avatar-male-4.jpg" class="avatar" />
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="nav-side-user.html" class="dropdown-item">Profile</a>
                    <a href="utility-account-settings.html" class="dropdown-item">Account Settings</a>
                    <a href="#" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse navbar-collapse justify-content-between" id="navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Overview</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" id="nav-dropdown-2">Pages</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="pages-app.html">App Pages</a>
                        <a class="dropdown-item" href="pages-utility.html">Utility Pages</a>
                        <a class="dropdown-item" href="pages-layouts.html">Layouts</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" id="nav-dropdown-3">Components</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>
                        <a class="dropdown-item" href="components-pipeline.html">Pipeline</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="documentation/index.html">Documentation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="documentation/changelog.html">Changelog</a>
            </li>
        </ul>
        <div class="d-lg-flex align-items-center">
            <form class="form-inline my-lg-0 my-2">
                <div class="input-group input-group-dark input-group-round">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="material-icons">search</i>
                        </span>
                    </div>
                    <input type="search" class="form-control form-control-dark" placeholder="Search" aria-label="Search app">
                </div>
            </form>
            <div class="dropdown mx-lg-2">
                <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="newContentButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add New
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Team</a>
                    <a class="dropdown-item" href="#">Project</a>
                    <a class="dropdown-item" href="#">Task</a>
                </div>
            </div>
            <div class="d-none d-lg-block">
                <div class="dropdown">
                    <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img alt="Image" src="assets/img/avatar-male-4.jpg" class="avatar" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="nav-side-user.html" class="dropdown-item">Profile</a>
                        <a href="utility-account-settings.html" class="dropdown-item">Account Settings</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
