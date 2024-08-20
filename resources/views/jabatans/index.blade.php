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
        margin-bottom: 10px
    }

    .alert {
        margin: 10px 0;
    }

    .mb-3 {
        margin-bottom: 10px;
    }
    .input-group p-7 {
        padding: 7px; */
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
<h3 class="text-center"> <b> Jabatan <b> </h3>
@if(session('success'))
<div class="alert alert-success" style="margin-top: 50px;">{{ session('success') }}</div>
@endif
<a href="{{ route('jabatans.create') }}" class="btn btn-primary mt-5"> <i class="fas fa-user-plus"></i>Create New Jabatan</a>
<form action="{{ route('jabatans.index') }}" method="GET" class="">
    <div class="input-group p-3 mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search Jabatan" value="{{ request('search') }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
<table class="table table-bordered text-center">
    <thead>
        <tr class="table-secondary">
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jabatans as $jabatan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jabatan->NamaJabatan }}</td>
            <td>
                <a href="{{ route('jabatans.edit', $jabatan->JabatanID) }}" class="btn btn-sm btn-primary"><i class="ti ti-ballpen"></i></a>
                <form action="{{ route('jabatans.destroy', $jabatan->JabatanID) }}" method="POST" class="d-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete" />
                    <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $jabatans->appends(request()->except('page'))->links() }}
@endsection