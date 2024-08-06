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
<h3 class="text-center"><b>Siswa</b></h3>
@if(session('success'))
<div class="alert alert-success" style="margin-top: 50px;">{{ session('success') }}</div>
@endif
<button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#createSiswaModal">Create New Siswa</button>
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


<!-- Create Siswa Modal -->
<div class="modal fade" id="createSiswaModal" tabindex="-1" role="dialog" aria-labelledby="createSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSiswaModalLabel">Create New Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Nisn">Nisn</label>
                        <input type="text" class="form-control" id="Nisn" name="Nisn" required>
                    </div>
                    <div class="form-group">
                        <label for="NamaSiswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="NamaSiswa" name="NamaSiswa" required>
                    </div>
                    <div class="form-group">
                        <label for="RuangID">Ruang</label>
                        <select class="form-control" id="RuangID" name="RuangID" required>
                            @foreach($ruangs as $ruang)
                            <option value="{{ $ruang->RuangID }}">{{ $ruang->NamaRuang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="KelasID">Kelas</label>
                        <select class="form-control" id="KelasID" name="KelasID" required>
                            @foreach($kelass as $kelas)
                            <option value="{{ $kelas->KelasID }}">{{ $kelas->NamaKelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Siswa Modal -->
<div class="modal fade" id="editSiswaModal" tabindex="-1" role="dialog" aria-labelledby="editSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSiswaModalLabel">Edit Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSiswaForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editNisn">Nisn</label>
                        <input type="text" class="form-control" id="editNisn" value="{{ $siswa->Nisn }} name="Nisn" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="editNamaSiswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="editNamaSiswa" name="NamaSiswa" required>
                    </div>
                    <div class="form-group">
                        <label for="editRuangID">Ruang</label>
                        <select class="form-control" id="editRuangID" name="RuangID" required>
                            @foreach($ruangs as $ruang)
                            <option value="{{ $ruang->RuangID }}">{{ $ruang->NamaRuang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editKelasID">Kelas</label>
                        <select class="form-control" id="editKelasID" name="KelasID" required>
                            @foreach($kelass as $kelas)
                            <option value="{{ $kelas->KelasID }}">{{ $kelas->NamaKelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
