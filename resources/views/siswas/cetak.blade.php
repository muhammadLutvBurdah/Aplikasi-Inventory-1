@extends('patrial.template')
@section('content')
<div class="table-responsive">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h1 class="text-center"> Data Siswa dan Karyawan </h1>
        </div>
        <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Data Siswa</button>
                    <button class="nav-link" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="false">Data Karyawan</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="mt-5">
    <div class="input-group mb-3">
        <a href="" onclick="event.preventDefault(); window.open('/cetaksiswa', '_blank');" class="btn btn-primary col-md-12">Cetak</a>
    </div>
</div>
                </div>
                <div class="tab-pane fade" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                <div class="mt-5">
    <div class="input-group mb-3">
        <a href="" onclick="event.preventDefault(); window.open('/cetakkaryawan', '_blank');" class="btn btn-primary col-md-12">Cetak</a>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

