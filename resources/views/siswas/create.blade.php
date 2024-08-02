@extends('patrial.template')

@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Create Name Siswa </b></h3>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('siswas.store') }}">
        {{ csrf_field() }}
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="Nisn">Nisn</label>
                        <input type="text" class="form-control" id="Nisn" name="Nisn" autocomplete="off" value="{{ old('Nisn') }}"  required>
                    </div>
                    <div class="form-group">
                        <label for="NamaSiswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="NamaSiswa" name="NamaSiswa" autocomplete="off" value="{{ old('NamaSiswa') }}"  required>
                    </div>
                    <div class="form-group">
                        <label for="RuangID">Ruang</label>
                        <select name="RuangID" class="form-control" id="RuangID">
                            <option value="">--Select Ruang--</option>
                            @foreach ($ruangs as $ruang)
                            <option value="{{ $ruang->RuangID }}">{{ $ruang->NamaRuang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="KelasID">Kelas</label>
                        <select name="KelasID" class="form-control" id="KelasID">
                            <option value="">--Select Kelas--</option>
                            @foreach ($kelass as $kelas)
                            <option value="{{$kelas->KelasID}}"> {{$kelas->NamaKelas}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                    <div class="row justify-content-end mt-2">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('siswas.index')}}" class="btn btn-secondary"> Back </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
