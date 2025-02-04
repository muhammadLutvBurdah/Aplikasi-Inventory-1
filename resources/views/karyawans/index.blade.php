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
        /* Mengurangi margin bottom pada tombol "Create New Karyawan" */
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
    <h3 class="text-center"> <b>Karyawan<b></h3>
    @if (session('success'))
        <div id="success-alert" class="alert alert-success" style="margin-top: 50px;">
            {{ session('success') }}
        </div>
    @endif
    {{-- <a href="{{ route('karyawans.index') }}" class="btn btn-primary mt-5">Create New Karyawan</a> --}}
    <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#createSiswaModal">
        <i class="fas fa-user-plus"></i> Create New Karyawan
    </button>
    <form action="{{ route('karyawans.index') }}" method="GET" class="">
        <div class="input-group p-3 mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search Karyawan"
                value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered text-center">
        <thead>
            <tr class="table-secondary">
                <th>No</th>
                <th>Nik</th>
                <th>Email</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($karyawans as $karyawan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $karyawan->Nik }}</td>
                    <td>{{ $karyawan->Email }}</td>
                    <td>{{ $karyawan->NamaKaryawan }}</td>
                    <td>{{ $karyawan->jabatan->NamaJabatan }}</td>
                    <td>{{ $karyawan->NoTelp }}</td>
                    <td>{{ $karyawan->Alamat }}</td>
                    <td>
                        <a href="{{ route('karyawans.edit', $karyawan->Nik) }}" class="btn btn-sm btn-primary"><i
                                class="ti ti-ballpen"></i></a>
                        <form action="{{ route('karyawans.destroy', $karyawan->Nik) }}" method="POST" class="d-inline">
                            <input type="hidden" name="_method" value="delete" />
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this name?')"><i
                                    class="ti ti-trash"></i></button>
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
    {{ $karyawans->appends(request()->except('page'))->links() }}

    <div class="modal fade" id="createSiswaModal" tabindex="-1" role="dialog" aria-labelledby="createSiswaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSiswaModalLabel">Create New Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('karyawans.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="NIK">Nik</label>
                            <input type="number" class="form-control" id="Nik" name="Nik" autocomplete="off"
                                value="{{ old('Nik') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="NamaKaryawan">Nama Karyawan</label>
                            <input type="text" class="form-control" id="NamaKaryawan" name="NamaKaryawan" required>
                        </div>
                        <div class="form-group">
                            <label for="JabatanID">Jabatan</label>
                            <select name="JabatanID" class="form-control" id="JabatanID">
                                <option value="">--Select Jabatan--</option>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->JabatanID }}">{{ $jabatan->NamaJabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <textarea name="Alamat" id="Alamat" class="form-control" rows="5">{{ old('Alamat') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="NoTelp">No Telepon</label>
                            <input type="text" inputmode="numeric" class="form-control" id="NoTelp" name="NoTelp"
                                value="{{ old('NoTelp') }}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" id="Email" name="Email" autocomplete="off"
                                value="{{ old('Email') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successAlert = document.getElementById('success-alert');
                if (successAlert) {
                    setTimeout(function() {
                        successAlert.style.opacity = '0';
                        setTimeout(function() {
                            successAlert.remove();
                        }, 500);
                    }, 3000);
                }
            });
        </script>
    @endsection
@endsection
