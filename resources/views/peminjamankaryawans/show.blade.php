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
                        {{ __('Detail Peminjaman Karyawan') }}
                    </div>
                    <p class="text-secondary">
                    <table width="380 mb-5">
                        <tbody>
                            <tr>
                                <th>ID Peminjaman Karyawan</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->PeminjamanKaryawanID }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->Tanggal }}</td>
                            </tr>
                            <tr>
                                <th>Nik</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->karyawan->Nik }}</td>
                            </tr>
                            <tr>
                                <th>Karyawan</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->NamaKaryawan }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->Jabatan }}</td>
                            </tr>
                            <tr>
                                <th>Barang</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->barang->NamaBarang }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->Jumlah }}</td>
                            </tr>
                            <tr>
                                <th>Petugas</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->Petugas }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->Status }}</td>
                            </tr>
                            <tr>
                                <th>Batas Pengembalian</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->BatasPengembalian }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengembalian</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->TanggalPengembalian }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Kembali</th>
                                <td>:</td>
                                <td>{{ $PeminjamanKaryawans->JumlahKembali }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection