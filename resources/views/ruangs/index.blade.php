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
<h3 class="text-center"> <b> Ruangan <b> </h3>
@if(session('success'))
<div class="alert alert-success" style="margin-top: 50px;">{{ session('success') }}</div>
@endif
<a href="{{ route('ruangs.create') }}" class="btn btn-primary mt-5">Create New Ruangan</a>
<form action="{{ route('ruangs.index') }}" method="GET" class="">
    <div class="input-group p-3 mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search Ruangan" value="{{ request('search') }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
<table class="table table-bordered text-center">
    <thead>
        <tr class="table-secondary">
            <th>No</th>
            <th>Nama Ruangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ruangs as $ruang)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ruang->NamaRuang }}</td>
            <td>
                <a href="{{ route('ruangs.edit', $ruang->RuangID) }}" title="edit" class="btn btn-primary"><i class="ti ti-ballpen"></i> </a>
                <form action="{{ route('ruangs.destroy', $ruang->RuangID) }}" method="POST" class="d-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete" />
                    <button type="submit" title="hapus" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $ruangs->appends(request()->except('page'))->links() }}
@endsection