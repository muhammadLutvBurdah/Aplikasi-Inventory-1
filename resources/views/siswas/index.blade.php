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
        /* Mengurangi margin bottom pada tombol "Create New Siswa" */
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
<h3 class="text-center"><b>Siswa</b></h3>
@if(session('success'))
<div class="alert alert-success" style="margin-top: 50px;">{{ session('success') }}</div>
@endif
<a href="{{ route('siswas.create') }}" class="btn btn-primary mt-5">Create New Siswa</a>
<form action="{{ route('siswas.index') }}" method="GET" class="">
    <div class="input-group p-3 mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search Siswa" value="{{ request('search') }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
<table class="table table-bordered text-center">
    <thead>
        <tr class="table-secondary">
            <th>No</th>
            <th>Nisn</th>
            <th>Nama Siswa</th>
            <th>Ruang</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswas as $siswa)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $siswa->Nisn }}</td>
            <td>{{ $siswa->NamaSiswa }}</td>
            <td>{{ $siswa->ruang->NamaRuang }}</td>
            <td>{{ $siswa->kelas->NamaKelas }}</td>
            <td>
                <a href="{{ route('siswas.edit', $siswa->Nisn) }}" class="btn btn-sm btn-primary"><i class="ti ti-ballpen"></i></a>
                <form action="{{ route('siswas.destroy', $siswa->Nisn) }}" method="POST" class="d-inline">
                    <input type="hidden" name="_method" value="delete" />
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this name?')"><i class="ti ti-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection