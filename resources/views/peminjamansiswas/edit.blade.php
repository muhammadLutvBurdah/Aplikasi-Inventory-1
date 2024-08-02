@extends('patrial.template')
@section('content')
<div class="table-responsive mt-5">
    <h3 class="text-center"><b>Edit Data Transaksi</b></h3>
    <form method="POST" action="{{ route('peminjamansiswas.update', $peminjamansiswa->PeminjamanSiswaID) }}">
        @csrf
        <input type="hidden" name="_method" value="put" />

        <div class="container mt-4">
            <div class="row">

                <div class="form-group mb-3">
                    <label for="NisnSelect">Select Nisn</label>
                    <select name="Nisn" class="form-control" id="NisnSelect">
                        <option value="">-- Select Nisn --</option>
                        @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->Nisn }}" {{ $siswa->Nisn == $peminjamansiswa->Nisn ? 'selected' : '' }}>
                            {{ $siswa->Nisn }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Siswa</span>
                    <input type="text" id="Siswa" class="form-control" name="NamaSiswa" value="{{$peminjamansiswa->NamaSiswa}}" placeholder="NamaSiswa" aria-label="NamaSiswa" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Kelas</span>
                    <input type="text" id="Kelas" class="form-control" name="Kelas" value="{{$peminjamansiswa->Kelas}}" placeholder="Kelas" aria-label="Kelas" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Ruang</span>
                    <input type="text" id="Ruang" class="form-control" name="Ruang" value="{{$peminjamansiswa->Ruang}}" placeholder="Ruang" aria-label="Ruang" readonly>
                </div>

                <div class="form-group mb-3"> 
                    <label for="BarangID">Barang</label>
                    <select name="BarangID" class="form-control" id="BarangID">
                        <option value="">--Select Barang--</option>
                        @foreach ($barangs as $barang)
                        <option value="{{ $barang->BarangID }}" {{ $peminjamansiswa->BarangID == $barang->BarangID ? 'selected' : '' }}>
                            {{ $barang->NamaBarang }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Jumlah </span>
                    <input type="number" class="form-control" name="Jumlah" placeholder="Jumlah" aria-label="Jumlah" value="{{ $peminjamansiswa->Jumlah }}" readonly>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Petugas</span>
                    <input type="text" class="form-control" name="Petugas" id="Petugas" placeholder="Petugas" aria-label="Petugas" value="{{ ucwords(Auth::user()->name) }}" disabled>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="menetap" {{ $peminjamansiswa->Status == "menetap" ? "checked" : "" }}>
                        <label class="form-check-label">Menetap</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="kembali" {{ $peminjamansiswa->Status == "kembali" ? "checked" : "" }}>
                        <label class="form-check-label">Kembali</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Batas Pengembalian</span>
                    <input type="date" class="form-control" name="BatasPengembalian" placeholder="BatasPengembalian" aria-label="BatasPengembalian" value="{{ $peminjamansiswa->Status == 'menetap' ? '' : $peminjamansiswa->BatasPengembalian }}" {{ $peminjamansiswa->Status == 'menetap' ? 'disabled' : '' }}>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Tanggal Pengembalian</span>
                    <input type="date" class="form-control" name="TanggalPengembalian" placeholder="Tanggal Pengembalian" aria-label="Tanggal Pengembalian" value="{{ $peminjamansiswa->Status == 'menetap' ? '' : $peminjamansiswa->TanggalPengembalian }}" {{ $peminjamansiswa->Status == 'menetap' ? 'disabled' : '' }}>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon11">Jumlah Kembali</span>
                    <input type="number" class="form-control" name="JumlahKembali" placeholder="--Jumlah Kembali--" aria-label="--Jumlah Kembali--" value="{{ $peminjamansiswa->Status == 'menetap' ? '' : $peminjamansiswa->JumlahKembali }}" {{ $peminjamansiswa->Status == 'menetap' ? 'disabled' : '' }}>
                </div>

            </div>
            <div class="d-flex justify-content-end mt-2">
                <button type="submit" class="btn btn-primary mr-2">Update</button>
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