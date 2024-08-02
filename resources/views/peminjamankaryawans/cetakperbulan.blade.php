@extends('patrial.template')
@section('content')
<div class="form-group">
    <p align="center"> <b> Laporan Data Karyawan </b> </p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr class="table-secondary text-center">
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nik</th>
            <th>Karyawan</th>
            <th>Jabatan</th>
            <th>Barang</th>
            <th>Petugas</th>
            <th>Status</th>
            <th>Tanggal Pengembalian</th>
        </tr>
        @foreach ($CetakPerbulan as $peminjamankaryawan)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $peminjamankaryawan->Tanggal ?: now() }}</td>
            <td>{{ $peminjamankaryawan->karyawan->Nik }}</td>
            <td>{{ $peminjamankaryawan->NamaKaryawan }}</td>
            <td>{{ $peminjamankaryawan->Jabatan }}</td>
            <td>{{ $peminjamankaryawan->barang->NamaBarang }}</td>
            <td>{{ $peminjamankaryawan->Petugas}}</td>
            <td>{{ $peminjamankaryawan->Status }}</td>
            <td>{{ $peminjamankaryawan->TanggalPengembalian}}</td>
        </tr>
        @endforeach
    </table>
</div>

<script type="text/javascript">
    window.print();
</script>
@endsection