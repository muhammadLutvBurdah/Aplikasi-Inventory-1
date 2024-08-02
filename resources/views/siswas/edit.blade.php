@extends('patrial.template')
@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Edit Nama Siswa </b></h3>
    <form method="POST" action="{{ route('siswas.update', $siswa->Nisn) }}">
        {{ csrf_field() }}
        <div class="container mt-4">
            <div class="row">
                <input type="hidden" name="_method" value="put" />

                <div class="form-group">
                    <label for="Nisn">Nisn</label>
                    <input type="text" class="form-control" id="Nisn" name="Nisn" value="{{ $siswa->Nisn }}" disabled>
                </div>

                <div class="form-group">
                    <label for="NamaSiswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="NamaSiswa" name="NamaSiswa" value="{{ $siswa->NamaSiswa }}" required>
                </div>
                <label for="RuangID">Ruang</label>
                <div class="form-group">
                    <select name="RuangID" class="form-control" required>
                        @foreach ($ruangs as $ruang)
                        <option value="{{ $ruang->RuangID }}" {{ $ruang->RuangID == $ruang->RuangID ? 'selected' : '' }}>
                            {{ $ruang->NamaRuang }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <label for="KelasID">Kelas</label>
                <div class="form-group">
                    <select name="KelasID" class="form-control" required>
                        @foreach ($kelass as $kelas)
                        <option value="{{ $kelas->KelasID }}" {{ $kelas->KelasID == $siswa->KelasID ? 'selected' : '' }}>
                            {{ $kelas->NamaKelas }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
    </form>
</div>
</form>
@endsection