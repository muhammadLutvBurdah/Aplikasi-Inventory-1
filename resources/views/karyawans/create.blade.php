<style>
    form {
        margin-top: 3rem;
    }
</style>

@extends('patrial.template')
@section('content')
    <div class="table-responsive mt-5">
        <h3 class="text-center"> <b> Create Name Karyawan </b></h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('karyawans.store') }}">
            {{ csrf_field() }}
            <div class="container mt-3">
                <div class="row">
                    <div class="demo-vertical-spacing demo-only-element col-md-19 my-3">

                        <div class="form-group">
                            <label for="NIK">Nik</label>
                            <input type="number" class="form-control" id="Nik" name="Nik" autocomplete="off"
                                value="{{ old('Nik') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="text" class="form-control" id="Email" name="Email" autocomplete="off"
                                value="{{ old('Email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="NamaKaryawan">Nama Karyawan</label>
                            <input type="text" class="form-control" id="NamaKaryawan" name="NamaKaryawan"
                                autocomplete="off" value="{{ old('NamaKaryawan') }}" required>
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
                            <label for="NoTelp">No Telepon</label>
                            <input type="text" inputmode="numeric" class="form-control" id="NoTelp" name="NoTelp"
                                value="{{ old('NoTelp') }}" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <textarea name="Alamat" id="Alamat" class="form-control" rows="5">{{ old('Alamat') }}</textarea>
                        </div>

                        <div class="row justify-content-end mt-2">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mr-2">Create Nama Karyawan</button>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('karyawans.index') }}" class="btn btn-secondary"> Back </a>
        </form>
    </div>
    </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']],
                ]
            });
        });
    </script>

@endsection
