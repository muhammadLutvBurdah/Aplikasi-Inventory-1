@extends('patrial.template')
@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Edit Data Barang Keluar </b></h3>
    <form method="POST" action="{{ route('barangkeluars.update', $BarangKeluar->BarangKeluarID) }}">
        {{ csrf_field() }}
        <div class="container mt-4">
            <div class="row">
                <input type="hidden" name="_method" value="put" />

                <div class="form-group mb-3">
                    <select name="BarangID" class="form-control" id="BarangID" class="form-select" required>
                        <option value="" disabled>--Nama Barang--</option>
                        @foreach ($barangs as $barang)
                        <option value="{{ $barang->BarangID }}" {{ $BarangKeluar->BarangID == $barang->BarangID ? 'selected' : '' }}>
                            {{ $barang->NamaBarang }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Jumlah</span>
                    <input type="number" class="form-control" name="Jumlah" value="{{$BarangKeluar->Jumlah}}" placeholder="Jumlah" aria-label="Jumlah" />
                </div>
            </div>

            <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Deskripsi</span>
                    <input type="text" class="form-control" name="Deskripsi" value="{{$BarangKeluar->Deskripsi}}" placeholder="Deskripsi" aria-label="Deskripsi" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Jenis Barang</span>
                    <input type="text" class="form-control" name="Jenis" value="{{$BarangKeluar->Jenis}}" placeholder="Jenis Barang" aria-label="Jenis Barang" />
                </div>

            <div class="d-flex justify-content-end mt-2">
                <button type="submit" class="btn btn-primary mr-2">Update</button>
    </form>
</div>
</form>
@endsection