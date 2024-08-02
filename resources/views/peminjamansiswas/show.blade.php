@extends('patrial.template')

@section('content')
<style>
    .custom-bg-info {
        background-color: #007BFF !important;
        border-color: #007BFF !important;
        color: #fff !important;
    }

    .table th,
    .table td {
        padding: 30px;
        /* Sesuaikan dengan jarak yang diinginkan */
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-stacked">
                <div class="card-body">
                    <div class="card-header custom-bg-info rounded-3 text-center">
                        {{ __('Detail Peminjaman Siswa') }}
                    </div>
                    <p class="text-secondary">
                    <table width="330 mb-5">
                        <tbody>
                            <tr>
                                <th>ID Peminjaman Siswa</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->PeminjamanSiswaID }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->Tanggal }}</td>
                            </tr>
                            <tr>
                                <th>Nisn</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->siswa->Nisn }}</td>
                            </tr>
                            <tr>
                                <th>Siswa</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->siswa->NamaSiswa }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->Kelas }}</td>
                            </tr>
                            <tr>
                                <th>Ruang</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->Ruang }}</td>
                            </tr>
                            <tr>
                                <th>Barang</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->barang->NamaBarang }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->Jumlah }}</td>
                            </tr>
                            <tr>
                                <th>Petugas</th>
                                <td>:</td>
                                <td>{{ ucwords(Auth::user()->name) }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->Status }}</td>
                            </tr>
                            <tr>
                                <th>Batas Pengembalian</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->BatasPengembalian }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengembalian</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->TanggalPengembalian }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Kembali</th>
                                <td>:</td>
                                <td>{{ $peminjamanSiswa->JumlahKembali }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection