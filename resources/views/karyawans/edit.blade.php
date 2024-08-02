@extends('patrial.template')
@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Edit Nama Karyawan </b></h3>
    <form method="POST" action="{{ route('karyawans.update', $karyawan->KaryawanID) }}">
        {{ csrf_field() }}
        <div class="container mt-4">
            <div class="row">
                <input type="hidden" name="_method" value="put" />

                <div class="form-group">
                    <label for="Nik">Nik</label>
                    <input type="text" name="Nik" class="form-control" value="{{ $karyawan->Nik }}" disabled>
                </div>


                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" name="Email" class="form-control" value="{{ $karyawan->Email }}" required>
                </div>

                <div class="form-group">
                    <label for="NamaKaryawan">Nama Karyawan</label>
                    <input type="text" name="NamaKaryawan" class="form-control" value="{{ $karyawan->NamaKaryawan }}" required>
                </div>

                <div class="form-group">
                    <label for="JabatanID">Jabatan</label>
                    <select name="JabatanID" class="form-control" required>
                        @foreach ($jabatans as $jabatan)
                        <option value="{{ $jabatan->JabatanID }}" {{ $jabatan->JabatanID == $karyawan->JabatanID ? 'selected' : '' }}>
                            {{ $jabatan->NamaJabatan }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="NoTelp">No Telepon</label>
                    <input type="text" name="NoTelp" class="form-control" value="{{ $karyawan->NoTelp }}" required>
                </div>

                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" name="Alamat" class="form-control" value="{{ $karyawan->Alamat }}" required>
                </div>

                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
    </form>
</div>
</form>
@endsection