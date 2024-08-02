@extends('patrial.template')
@section('content')
<div class="form-group">
    <p align="center"> <b> Laporan Data Barang masuk </b> </p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr class="table-secondary text-center">
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Deskripsi</th>
        </tr>
        @foreach ($CetakBarangM as $barangmasuk)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $barangmasuk->Tanggal ?: now() }}</td>
            <td>{{ $barangmasuk->barangs->NamaBarang }}</td>
            <td>{{ $barangmasuk->Jumlah}}</td>
            <td>{{ $barangmasuk->Deskripsi }}</td>
        </tr>
        @endforeach
    </table>
</div>

<script type="text/javascript">
    window.print();
</script>
@endsection