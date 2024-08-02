@extends('patrial.template')
@section('content')

<div class="form-group">
    <p align="center"> <b> Data Siswa </b> </p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr class="table-secondary text-center">
            <th>No</th>
            <th>Nisn</th>
            <th>Nama Siswa</th>
            <th>Ruang</th>
            <th>Kelas</th>
        </tr>
        @foreach ($SiswaCetak as $siswa)
        <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
            <td>{{ $siswa->Nisn }}</td>
            <td>{{ $siswa->NamaSiswa }}</td>
            <td>{{ $siswa->ruang->NamaRuang }}</td>
            <td>{{ $siswa->kelas->NamaKelas }}</td>
            <td>
        </tr>
        @endforeach
    </table>
</div>

<script type="text/javascript">
    window.print();
</script>
@endsection