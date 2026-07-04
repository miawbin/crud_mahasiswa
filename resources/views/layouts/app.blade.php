<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Mahasiswa | UNBIN</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>

        body{
            background:#f4f7fb;
            font-family:'Figtree',sans-serif;
        }

        .navbar-unbin{
            background:#0d6efd;
        }

        .logo-unbin{
            width:55px;
            height:55px;
            object-fit:contain;
            background:white;
            border-radius:10px;
            padding:4px;
        }

        .footer{
            margin-top:40px;
            text-align:center;
            color:#6c757d;
            padding:20px;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-unbin">

    <div class="container">

        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">

            <img src="{{ asset('images/unbin.jpg') }}"
                 class="logo-unbin me-3"
                 alt="Logo UNBIN">

            <div>

                <h5 class="mb-0 fw-bold">

                    Sistem Informasi Mahasiswa

                </h5>

                <small>

                    Universitas Binaniaga Indonesia

                </small>

            </div>

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-5">

                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}"
                       href="{{ route('dashboard') }}">

                        <i class="bi bi-speedometer2"></i>

                        Dashboard

                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active fw-bold' : '' }}"
                       href="{{ route('mahasiswa.index') }}">

                        <i class="bi bi-mortarboard-fill"></i>

                        Mahasiswa

                    </a>

                </li>

            </ul>

            <div class="ms-auto">

                <div class="dropdown">

                    <button class="btn btn-light dropdown-toggle"
                            data-bs-toggle="dropdown">

                        <i class="bi bi-person-circle"></i>

                        {{ Auth::user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <form method="POST"
                                  action="{{ route('logout') }}">

                                @csrf

                                <button class="dropdown-item">

                                    <i class="bi bi-box-arrow-right"></i>

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</nav>

<div class="container py-4">

    @yield('content')

</div>

<div class="footer">

    © {{ date('Y') }} Universitas Binaniaga Indonesia

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>