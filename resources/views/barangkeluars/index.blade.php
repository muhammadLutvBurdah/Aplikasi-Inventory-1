<!-- Tambahkan styling CSS untuk mengurangi ukuran padding dan margin -->
<style>
    .table {
        margin-bottom: 0;
        /* Mengurangi margin bottom pada tabel */
    }

    .table th,
    .table td {
        padding: 0.5rem;
        /* Mengurangi padding pada sel header dan sel data */
        font-size: 14px;
        /* Menyesuaikan ukuran font */
    }

    .input-group {
        margin-bottom: 0;
        /* Mengurangi margin bottom pada input-group */
    }

    .btn-sec {
        margin-bottom: 10px;
        /* Mengurangi margin bottom pada tombol "Create New Barang Keluar" */
    }

    .alert {
        margin: 10px 0;
        /* Mengurangi margin pada elemen alert */
    }

    .mb-3 {
        margin-bottom: 10px;
        /* Mengurangi margin bottom pada form search */
    }
</style>

@extends('patrial.template')
@section('content')
<h3 class="text-center"><b>Barang Keluar<b></h3>
@if(session('success'))
<div class="alert alert-success" style="margin-top: 50px;">{{ session('success') }}</div>
@endif
<a href="{{ route('barangkeluars.create') }}" class="btn btn-primary mt-5">Create New Barang Keluar</a>
<form action="{{ route('barangkeluars.index') }}" method="GET" class="">
    <div class="input-group p-3 mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search Barang Keluar" value="{{ request('search') }}">
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
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Deskripsi</th>
            <th>Jenis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($BarangKeluar as $barangkeluar)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $barangkeluar->Tanggal ?: now() }}</td>
            <td>{{ $barangkeluar->barangs->NamaBarang }}</td>
            <td>{{ $barangkeluar->Jumlah }}</td>
            <td>{{ $barangkeluar->Deskripsi }}</td>
            <td>{{ $barangkeluar->Jenis }}</td>
            <td>
                <a href="{{ route('barangkeluars.edit', $barangkeluar->BarangKeluarID) }}" class="btn btn-sm btn-primary"><i class="ti ti-ballpen"></i></a>
                <form action="{{ route('barangkeluars.destroy', $barangkeluar->BarangKeluarID) }}" method="POST" class="d-inline">
                    <input type="hidden" name="_method" value="delete" />
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="ti ti-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No records found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection