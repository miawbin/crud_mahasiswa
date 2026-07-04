@extends('layouts.app')

@section('content')

<div class="row mb-4">

    <div class="col-lg-8">

        <div class="d-flex align-items-center">

            <img src="{{ asset('images/unbin.jpg') }}"
                 width="70"
                 class="me-3 rounded shadow">

            <div>

                <h2 class="fw-bold text-primary mb-0">

                    Sistem Informasi Mahasiswa

                </h2>

                <small class="text-muted">

                    Universitas Binaniaga Indonesia

                </small>

            </div>

        </div>

    </div>

    <div class="col-lg-4 text-end">

        <a href="{{ route('mahasiswa.create') }}"
           class="btn btn-success shadow">

            <i class="bi bi-plus-circle-fill"></i>

            Tambah Mahasiswa

        </a>

    </div>

</div>

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show shadow-sm">

    <i class="bi bi-check-circle-fill"></i>

    {{ session('success') }}

    <button class="btn-close"
            data-bs-dismiss="alert"></button>

</div>

@endif

<div class="card shadow-lg border-0 rounded-4">

    <div class="card-header bg-primary text-white">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h4 class="mb-0">

                    <i class="bi bi-table"></i>

                    Data Mahasiswa

                </h4>

            </div>

            <div class="col-md-6 text-end">

                <span class="badge bg-warning text-dark fs-6">

                    Total Mahasiswa :
                    {{ $mahasiswa->total() }}

                </span>

            </div>

        </div>

    </div>

    <div class="card-body">

        <form method="GET"
              action="{{ route('mahasiswa.index') }}"
              class="mb-4">

            <div class="row">

                <div class="col-md-8">

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="bi bi-search"></i>

                        </span>

                        <input
                            type="text"
                            name="keyword"
                            class="form-control"
                            placeholder="Cari NPM, Nama, Jurusan atau Email..."
                            value="{{ request('keyword') }}">

                        <button class="btn btn-primary">

                            Cari

                        </button>

                        <a href="{{ route('mahasiswa.index') }}"
                           class="btn btn-secondary">

                            Reset

                        </a>

                    </div>

                </div>

            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-hover table-bordered align-middle">

                <thead class="table-primary text-center">

                <tr>

                    <th width="70">No</th>

                    <th>NPM</th>

                    <th>Nama</th>

                    <th>Jurusan</th>

                    <th>Email</th>

                    <th width="180">Aksi</th>

                </tr>

                </thead>

                <tbody>

                @forelse($mahasiswa as $item)

                <tr>

                    <td class="text-center">

                        <span class="badge bg-primary">

                            {{ ($mahasiswa->currentPage()-1) * $mahasiswa->perPage() + $loop->iteration }}

                        </span>

                    </td>

                    <td>

                        {{ $item->npm }}

                    </td>

                    <td class="fw-bold">

                        {{ $item->nama }}

                    </td>

                    <td>

                        {{ $item->jurusan }}

                    </td>

                    <td>

                        {{ $item->email }}

                    </td>

                    <td class="text-center">

                        <a href="{{ route('mahasiswa.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                        <form action="{{ route('mahasiswa.destroy',$item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data mahasiswa?')">

                                <i class="bi bi-trash-fill"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6">

                        <div class="text-center py-5">

                            <i class="bi bi-database-x display-1 text-secondary"></i>

                            <h4 class="mt-3">

                                Belum Ada Data Mahasiswa

                            </h4>

                            <p class="text-muted">

                                Klik tombol Tambah Mahasiswa untuk menambahkan data.

                            </p>

                            <a href="{{ route('mahasiswa.create') }}"
                               class="btn btn-primary">

                                <i class="bi bi-plus-circle"></i>

                                Tambah Mahasiswa

                            </a>

                        </div>

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">

            <div class="text-muted">

                Menampilkan

                <strong>

                    {{ $mahasiswa->firstItem() ?? 0 }}

                </strong>

                -

                <strong>

                    {{ $mahasiswa->lastItem() ?? 0 }}

                </strong>

                dari

                <strong>

                    {{ $mahasiswa->total() }}

                </strong>

                data

            </div>

            {{ $mahasiswa->withQueryString()->links() }}

        </div>

    </div>

</div>

@endsection