@extends('patrial.template')
@section('content')

<div class="form-group">
    <p align="center"> <b> Laporan Data Siswa </b> </p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr class="table-secondary text-center">
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nisn</th>
            <th>Siswa</th>
            <th>Barang</th>
            <th>Petugas</th>
            <th>Status</th>
            <th>Tanggal Pengembalian</th>
        </tr>
        @foreach ($CetakPerbulan as $peminjamansiswa)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $peminjamansiswa->Tanggal ?: now() }}</td>
            <td>{{ $peminjamansiswa->Nisn }}</td>
            <td>{{ $peminjamansiswa->siswa->NamaSiswa }}</td>
            <td>{{ $peminjamansiswa->barang->NamaBarang }}</td>
            <td>{{ $peminjamansiswa->Petugas}}</td>
            <td>{{ $peminjamansiswa->Status }}</td>
            <td>{{ $peminjamansiswa->TanggalPengembalian}}</td>
        </tr>
        @endforeach
    </table>
</div>

<script type="text/javascript">
    window.print();
</script>
@endsection