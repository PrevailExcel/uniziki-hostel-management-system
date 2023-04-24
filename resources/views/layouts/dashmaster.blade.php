<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard </title>

    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/"> --}}



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta name="theme-color" content="#7952b3">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark bg-theme-2 flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Project name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="{{('logout') }}">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page"
                                href="{{('dashboard') }}">
                                <span class="fa fa-tachometer"></span>
                                Dashboard
                            </a>
                        </li>
                        @if (auth()->user()->type == 0)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dashboard/hospitals*') ? 'active' : '' }}"
                                    href="{{('hospitals') }}">
                                    <span class="fa fa-hospital-o"></span>
                                    Spaces
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dashboard/users*') ? 'active' : '' }}"
                                    href="{{('users') }}">
                                    <span class="fa fa-users"></span>
                                    Payments
                                </a>
                            </li>
                        @endif

                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Others</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard/profile') ? 'active' : '' }}"
                                href="{{('dash.profile') }}">
                                <span class="fa fa-cogs"></span>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{('logout') }}">
                                <span class="fa fa-sign-out"></span>
                                Logout
                            </a>
                        </li>


                        @if (auth()->user()->type == 2)
                            <li class="nav-item mt-3">
                                <hr class="my-2">
                                <a class="nav-link" href="javascript:void(0)">
                                    <b>
                                        {{ auth()->user()->hospital->name }}
                                    </b>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('body')
            </main>
            <footer class="container-fluid text-right bg-light">
                &copy; 2023
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @yield('js')
</body>

</html>
