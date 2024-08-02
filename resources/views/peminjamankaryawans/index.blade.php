<style>
    .table {
        margin-bottom: 0;
        /* Mengurangi margin bottom pada tabel */
    }

    .table th,
    .table td {
        padding: 0.5rem;
        /* Mengurangi padding pada sel header dan sel data */
    }

    .input-group {
        margin-bottom: 0;
        /* Mengurangi margin bottom pada input-group */
    }

    .btn-sec {
        margin-bottom: 10px;
        /* Mengurangi margin bottom pada tombol "Create New Ruangan" */
    }

    .alert {
        margin: 10px 0;
        /* Mengurangi margin pada elemen alert */
    }

    .mb-3 {
        margin-bottom: 10px;
        /* Mengurangi margin bottom pada form search */
    }

    .input-group p-7 {
        padding: 7px;
        /* Mengurangi padding pada input-group */
    }

    /* Menambahkan style untuk tabel */
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6 !important;
    }

    .table th,
    .table td {
        font-size: 14px;
        /* Menyesuaikan ukuran font */
    }

    .table th {
        font-weight: bold;
        /* Menyesuaikan ketebalan font pada header */
    }

    .table-secondary th,
    .table-secondary td {
        background-color: #f8f9fa;
        /* Mengganti warna latar belakang header */
    }
</style>

@extends('patrial.template')
@section('content')
<h3 class="text-center"> <b> Transaksi Karyawan <b> </h3>
@if(session('success'))
<div class="alert alert-success" style="margin-top: 50px;">{{ session('success') }}</div>
@endif
<a href="{{ route('peminjamankaryawans.create') }}" class="btn btn-primary mt-5">Create New Transaksi</a>
<form action="{{ route('peminjamankaryawans.index') }}" method="GET" class="">
    <div class="input-group p-3">
        <input type="text" name="search" class="form-control" placeholder="Search" value="{{ $search }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
<table class="table table-bordered text-center">
    <thead>
        <tr class="table-secondary">
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nik</th>
            <th>Karyawan</th>
            <th>Barang</th>
            <th>Status</th>
            <th>Tanggal Pengembalian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($PeminjamanKaryawans as $peminjamankaryawan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $peminjamankaryawan->Tanggal ?: now() }}</td>
            <td>{{ $peminjamankaryawan->karyawan->Nik }}</td>
            <td>{{ $peminjamankaryawan->NamaKaryawan }}</td>
            <td>{{ $peminjamankaryawan->barang->NamaBarang }}</td>
            <td>{{ $peminjamankaryawan->Status }}</td>
            <td>{{ $peminjamankaryawan->TanggalPengembalian}}</td>
            <td>
                <a href="{{ route('peminjamankaryawans.edit', $peminjamankaryawan->PeminjamanKaryawanID) }}" class="btn btn-sm btn-success"><i class="ti ti-ballpen"></i></a>
                <a href="{{ route('peminjamankaryawans.show', $peminjamankaryawan->PeminjamanKaryawanID) }}" class="btn btn-sm btn-primary"><i class="ti ti-eye"></i></a>
                <form action="{{ route('peminjamankaryawans.destroy', $peminjamankaryawan->PeminjamanKaryawanID) }}" method="POST" class="d-inline">
                    <input type="hidden" name="_method" value="delete" />
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this transaction?')"><i class="ti ti-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">No records found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection