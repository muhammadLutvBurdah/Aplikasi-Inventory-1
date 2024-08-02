@extends('patrial.template')
@section('content')

<div class="form-group">
    <p align="center"> <b> Data Karyawan </b> </p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr class="table-secondary text-center">
            <th>No</th>
            <th>Nik</th>
            <th>Email</th>
            <th>Nama Karyawan</th>
            <th>Jabatan</th>
            <th>No Telepon</th>
            <th>Alamat</th>
        </tr>
        @foreach ($KaryawanCetak as $karyawan)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $karyawan->Nik}}</td>
            <td>{{ $karyawan->Email}}</td>
            <td>{{ $karyawan->NamaKaryawan }}</td>
            <td>{{ $karyawan->jabatan->NamaJabatan }}</td>
            <td>{{ $karyawan->NoTelp}}</td>
            <td>{{ $karyawan->Alamat}}</td>
            <td>
        </tr>
        @endforeach
    </table>
</div>

<script type="text/javascript">
    window.print();
</script>
@endsection