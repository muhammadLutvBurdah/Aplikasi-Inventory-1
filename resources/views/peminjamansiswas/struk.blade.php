@extends('patrial.template')
@section('content')

<style>
.card {
        width: 400px;
        height: 200px;
        border-radius: 20px;
        margin-top: 101px;
        margin-left: 270px;
        background-color: white;
    }
</style>

<div class="col-md-3 col-lg-6">
    <from method="post" class="card border-primary mb-10">
        <div class="card-body">
            @csrf
            <div class="mb-1">
                <label for="" class="form-label fs-20">NISN</label>
                <input type="number" name="Nisn" id="Nisn" value="{{ $Nisn }}" class="form-control @error('Nisn') is-invalid @enderror" placeholder="Masukan NISN" readonly>
                @error('Nisn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-1">
                <label for="" class="form-label fs-20">Tanggal</label>
                <input type="date" name="Tanggal" id="Tanggal" value="{{ date('Y-m-d') }}" class="form-control @error('Tanggal') is-invalid @enderror" placeholder="Pilih Tanggal" readonly>
                @error('Tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="card-footer bg-primary d-flex justify-content-between align-items-center">
            <a href="{{ route('peminjamansiswas.index')}}" class="btn btn-light text-primary"> Back </a>
            <a href="" onclick="this.href='/cetak_buktipdff/'+ document.getElementById('Nisn').value + 
        '/' + document.getElementById('Tanggal').value " role="button" class="btn btn-light text-primary">
                Cetak bukti
            </a>
        </div>
        </form>
</div>
@endsection