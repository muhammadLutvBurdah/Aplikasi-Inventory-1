<style>
    .table {
        margin-bottom: 0;
    }

    .table th,
    .table td {
        padding: 0.5rem;
        font-size: 14px;
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
</style>

@extends('patrial.template')
@section('content')
<h3 class="text-center"><b>Barang<b></h3>
@if(session('success'))
<div class="alert alert-success" style="margin-top: 50px;">{{ session('success') }}</div>
@endif
<a href="{{ route('barangs.create') }}" class="btn btn-primary mt-5"> <i class="fas fa-user-plus"></i>Create New Barang</a>
<form action="{{ route('barangs.index') }}" method="GET" class="">
    <div class="input-group p-3 mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search Barang" value="{{ request('search') }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
<table class="table table-bordered text-center">
    <thead>
        <tr class="table-secondary">
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stock</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($barangs as $barang)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $barang->NamaBarang }}</td>
            <td>{{ $barang->StockQuantity }}</td>
            <td>
                <a href="{{ route('barangs.edit', $barang->BarangID) }}" class="btn btn-sm btn-primary"><i class="ti ti-ballpen"></i></a>
                <form action="{{ route('barangs.destroy', $barang->BarangID) }}" method="POST" class="d-inline">
                    <input type="hidden" name="_method" value="delete" />
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this name?')"><i class="ti ti-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No records found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $barangs->appends(request()->except('page'))->links() }}
@endsection