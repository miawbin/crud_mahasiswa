@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header bg-success text-white">

                <div class="d-flex align-items-center">

                    <img src="{{ asset('images/unbin.jpg') }}"
                         width="60"
                         class="me-3 rounded bg-white p-1">

                    <div>

                        <h3 class="mb-0">

                            <i class="bi bi-person-plus-fill"></i>

                            Tambah Data Mahasiswa

                        </h3>

                        <small>
                            Universitas Binaniaga Indonesia
                        </small>

                    </div>

                </div>

            </div>

            <div class="card-body">

                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            Terjadi Kesalahan
                        </strong>

                        <ul class="mt-2 mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('mahasiswa.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                <i class="bi bi-credit-card"></i>

                                NPM

                            </label>

                            <input
                                type="text"
                                name="npm"
                                class="form-control form-control-lg"
                                value="{{ old('npm') }}"
                                placeholder="Masukkan NPM">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                <i class="bi bi-person-fill"></i>

                                Nama Mahasiswa

                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control form-control-lg"
                                value="{{ old('nama') }}"
                                placeholder="Masukkan Nama Mahasiswa">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                <i class="bi bi-book-half"></i>

                                Jurusan

                            </label>

                            <input
                                type="text"
                                name="jurusan"
                                class="form-control form-control-lg"
                                value="{{ old('jurusan') }}"
                                placeholder="Masukkan Jurusan">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                <i class="bi bi-envelope-fill"></i>

                                Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg"
                                value="{{ old('email') }}"
                                placeholder="Masukkan Email">

                        </div>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('mahasiswa.index') }}"
                           class="btn btn-secondary btn-lg">

                            <i class="bi bi-arrow-left-circle"></i>

                            Kembali

                        </a>

                        <button class="btn btn-success btn-lg">

                            <i class="bi bi-save-fill"></i>

                            Simpan Data

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection