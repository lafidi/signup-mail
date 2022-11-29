<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
    <title>@yield('titel')</title>
</head>
<body>
<!-- top navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebar"
            aria-controls="offcanvasExample"
        >
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
            class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
            href="#"
        >@yield('titel')</a
        >
    </div>
</nav>
<!-- top navigation bar -->
<!-- offcanvas -->
<div
    class="offcanvas offcanvas-start sidebar-nav bg-dark"
    tabindex="-1"
    id="sidebar"
>
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        Veranstaltungsanmeldung
                    </div>
                </li>
                <li>
                    <a href="{{ route('anmeldungsuebersicht') }}" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-calendar-check"></i></span>
                        <span>Startseite</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider bg-light"/>
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Verwaltung
                    </div>
                </li>
                @if (Auth::check())
                    <li>
                        <a href="{{ route('logout') }}" class="nav-link px-3" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="me-2"><i class="bi bi-box-arrow-right"></i></span>
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li>
                        <a href="{{ route('veranstaltung.index') }}" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-calendar"></i></span>
                            <span>Veranstaltungsverwaltung</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('benutzer.index') }}" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-people-fill"></i></span>
                            <span>Benutzerverwaltung</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-box-arrow-in-right"></i></span>
                            <span>Login</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
<!-- offcanvas -->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        @yield('content')
    </div>
</main>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="/js/jquery-3.5.1.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap5.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
