<style>
    .table {
        margin-bottom: 0;
    }

    .table th,
    .table td {
        padding: 0.5rem;
    }

    .input-group {
        margin-bottom: 0;
    }

    .btn-sec {
        margin-bottom: 10px;
    }

    .alert {
        margin: 10px 0;
    }

    .mb-3 {
        margin-bottom: 10px;
    }

    .input-group p-7 {
        padding: 7px;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6 !important;
    }

    .table th,
    .table td {
        font-size: 14px;
    }

    .table th {
        font-weight: bold;
    }

    .table-secondary th,
    .table-secondary td {
        background-color: #f8f9fa;
    }
</style>

@extends('patrial.template')
@section('content')
<h3 class="text-center"> <b> Transaksi Siswa <b> </h3>

@if(session('success'))
<div class="alert alert-success" style="margin-top: 50px;">{{ session('success') }}</div>
@endif
<a href="{{ route('peminjamansiswas.create') }}" class="btn btn-primary mt-5 me-2"> <i class="fas fa-user-plus"></i>Create New Transaksi</a>
<form action="{{ route('peminjamansiswas.index') }}" method="GET" class="">
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
            <th>Nisn</th>
            <th>Siswa</th>
            <th>Barang</th>
            <th>Status</th>
            <th>Tanggal Pengembalian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($PeminjamanSiswas as $peminjamansiswa)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $peminjamansiswa->Tanggal ?: now() }}</td>
            <td>{{ $peminjamansiswa->siswa->Nisn }}</td>
            <td>{{ $peminjamansiswa->NamaSiswa }}</td>
            <td>{{ $peminjamansiswa->barang->NamaBarang }}</td>
            <td>{{ $peminjamansiswa->Status }}</td>
            <td>{{ $peminjamansiswa->TanggalPengembalian}}</td>
            <td>
                <a href="{{ route('peminjamansiswas.edit', $peminjamansiswa->PeminjamanSiswaID) }}" class="btn btn-sm btn-success"><i class="ti ti-ballpen"></i></a>
                <a href="{{ route('peminjamansiswas.show', $peminjamansiswa->PeminjamanSiswaID) }}" class="btn btn-sm btn-primary"><i class="ti ti-eye"></i></a>
                <form action="{{ route('peminjamansiswas.destroy', $peminjamansiswa->PeminjamanSiswaID) }}" method="POST" class="d-inline">
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