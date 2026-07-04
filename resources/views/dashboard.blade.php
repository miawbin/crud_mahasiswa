@extends('layouts.app')

@section('content')

<div class="row mb-4">

    <div class="col-md-12">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-md-8">

                        <h2 class="fw-bold text-primary">

                            <i class="bi bi-mortarboard-fill"></i>

                            Selamat Datang,
                            {{ Auth::user()->name }}

                        </h2>

                        <p class="text-muted mb-0">

                            Sistem Informasi Mahasiswa
                            Universitas Binaniaga Indonesia

                        </p>

                    </div>

                    <div class="col-md-4 text-end">

                        <img src="{{ asset('images/unbin.jpg') }}"
                             width="90">

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row g-4">

    <div class="col-md-4">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body text-center">

                <div class="display-3 text-primary mb-3">

                    <i class="bi bi-mortarboard-fill"></i>

                </div>

                <h1 class="fw-bold">

                    {{ \App\Models\Mahasiswa::count() }}

                </h1>

                <h5>

                    Total Mahasiswa

                </h5>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body text-center">

                <div class="display-3 text-success mb-3">

                    <i class="bi bi-person-check-fill"></i>

                </div>

                <h1 class="fw-bold">

                    {{ \App\Models\User::count() }}

                </h1>

                <h5>

                    Total User

                </h5>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow border-0 rounded-4">

            <div class="card-body text-center">

                <div class="display-3 text-warning mb-3">

                    <i class="bi bi-folder2-open"></i>

                </div>

                <h1 class="fw-bold">

                    CRUD

                </h1>

                <h5>

                    Kelola Mahasiswa

                </h5>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-lg border-0 rounded-4 mt-5">

    <div class="card-body">

        <h4 class="fw-bold text-primary">

            Menu Utama

        </h4>

        <hr>

        <div class="d-flex gap-3">

            <a href="{{ route('mahasiswa.index') }}"
               class="btn btn-primary btn-lg">

                <i class="bi bi-table"></i>

                Data Mahasiswa

            </a>

            <a href="{{ route('mahasiswa.create') }}"
               class="btn btn-success btn-lg">

                <i class="bi bi-plus-circle"></i>

                Tambah Mahasiswa

            </a>

        </div>

    </div>

</div>

@endsection