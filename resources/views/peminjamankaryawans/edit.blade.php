@extends('patrial.template')
@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"> <b> Edit Data Transaksi </b></h3>
    <form method="POST" action="{{ route('peminjamankaryawans.update', $peminjamankaryawan->PeminjamanKaryawanID) }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put" />

        <div class="container mt-4">
            <div class="row">

                <div class="form-group mb-3">
                    <label for="NikSelect">Select Nik</label>
                    <select name="Nik" class="form-control" id="NikSelect">
                        <option value="">-- Select Nik --</option>
                        @foreach ($karyawans as $karyawan)
                        <option value="{{ $karyawan->Nik }}" {{ $karyawan->Nik == $peminjamankaryawan->Nik ? 'selected' : '' }}>
                            {{ $karyawan->Nik }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Karyawan</span>
                    <input type="text" id="Karyawan" class="form-control" name="NamaKaryawan" value="{{$peminjamankaryawan->NamaKaryawan}}" placeholder="NamaKaryawan" aria-label="NamaKaryawan" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Jabatan</span>
                    <input type="text" id="Jabatan" class="form-control" name="Jabatan" value="{{$peminjamankaryawan->Jabatan}}" placeholder="Jabatan" aria-label="Jabatan" readonly>
                </div>


                <div class="form-group mb-3">
                    <select name="BarangID" class="form-control" id="BarangID">
                        <option value="">--Select Barang--</option>
                        @foreach ($barangs as $barang)
                        <option value="{{ $barang->BarangID }}" {{ $peminjamankaryawan->BarangID == $barang->BarangID ? 'selected' : '' }}>
                            {{ $barang->NamaBarang }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Jumlah </span>
                    <input type="number" class="form-control" name="Jumlah" placeholder="Jumlah" aria-label="Jumlah" value="{{ $peminjamankaryawan->Jumlah }}" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Petugas</span>
                    <input type="text" class="form-control" name="Petugas" id="Petugas" placeholder="Petugas" aria-label="Petugas" value="{{ ucwords(Auth::user()->name) }}" disabled>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="menetap" {{ $peminjamankaryawan->Status == "menetap" ? "checked" : "" }}>
                        <label class="form-check-label">Menetap</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="kembali" {{ $peminjamankaryawan->Status == "kembali" ? "checked" : "" }}>
                        <label class="form-check-label">Kembali</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Batas Pengembalian</span>
                    <input type="date" class="form-control" name="BatasPengembalian" placeholder="BatasPengembalian" aria-label="BatasPengembalian" value="{{ $peminjamankaryawan->Status == 'menetap' ? '' : $peminjamankaryawan->BatasPengembalian }}" {{ $peminjamankaryawan->Status == 'menetap' ? 'disabled' : '' }}>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Tanggal Pengembalian</span>
                    <input type="date" class="form-control" name="TanggalPengembalian" placeholder="Tanggal Pengembalian" aria-label="Tanggal Pengembalian" value="{{ $peminjamankaryawan->Status == 'menetap' ? '' : $peminjamankaryawan->TanggalPengembalian }}" {{ $peminjamankaryawan->Status == 'menetap' ? 'disabled' : '' }}>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Jumlah Kembali</span>
                    <input type="number" class="form-control" name="JumlahKembali" placeholder="--Jumlah Kembali--" aria-label="--Jumlah Kembali--" value="{{ $peminjamankaryawan->Status == 'menetap' ? '' : $peminjamankaryawan->JumlahKembali }}" {{ $peminjamankaryawan->Status == 'menetap' ? 'disabled' : '' }}>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const statusRadio = document.querySelectorAll('input[name="status"]');
    const batasPengembalianField = document.getElementById('BatasPengembalian');
    const tanggalPengembalianField = document.querySelector('input[name="TanggalPengembalian"]');
    const jumlahKembaliField = document.querySelector('input[name="JumlahKembali"]');

    statusRadio.forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (this.value === 'menetap') {
                batasPengembalianField.value = ''; // Clear the value
                batasPengembalianField.setAttribute('disabled', true);
                tanggalPengembalianField.value = '';
                tanggalPengembalianField.setAttribute('disabled', true);
                jumlahKembaliField.value = '';
                jumlahKembaliField.setAttribute('disabled', true);
            } else if (this.value === 'kembali') {
                batasPengembalianField.removeAttribute('disabled');
                tanggalPengembalianField.removeAttribute('disabled');
                jumlahKembaliField.removeAttribute('disabled');
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        const tanggalPengembalianField = document.querySelector('input[name="TanggalPengembalian"]');
        const jumlahField = document.querySelector('input[name="Jumlah"]');
        const jumlahKembaliField = document.querySelector('input[name="JumlahKembali"]');

        tanggalPengembalianField.addEventListener('change', function() {
            if (this.value !== '') {
                jumlahKembaliField.value = jumlahField.value;
            } else {
                jumlahKembaliField.value = '';
            }
        });
    });
</script>
@endsection