<style>
    @page {
        size: 6in 10in;
    }

    #judul {
        text-align: center;
    }

    #halaman {
        width: auto;
        height: auto;
        position: absolute;
        border: 1px;
        padding-top: 30px;
        padding-left: 30px;
        padding-right: 30px;
        padding-bottom: 30px;
    }
</style>

<div id="halaman">
    <table>
        <tr>
            <td>
                <center>
                    <font size="4"> Sekolah Menengah Kejuruan </font> <br>
                    <font size="5"> INFORMATIKA UTAMA </font> <br>
                    <font size="2"> Komplek PT PLN P3B No. 61 Kelurahan Krukut Kecamatan Limo Depok - Jawa Barat </font>
            </td>
        </tr>
        <tr>
            <td colspan="7">
                <hr>
            </td>
        </tr>
    </table>

    <table width="320">
        <center>
            <font size="4"> <b>BUKTI PEMINJAMAN BARANG </b></font>
        </center>
        <>
            <p>
    </table>

    <table>
        <tr>
            <td>Yang bertanda tangan di bawah ini : </td>
        </tr>
<!-- 525 with tgl kmbli -->
        <table width="350">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><b>{{ ucwords(Auth::user()->name) }}</b></td>
            </tr> <br>
        </table>

        <tr>
            <td>Menyatakan dengan sebenernya bahwa : </td>
        </tr>
    </table>

<!-- 282 with tgl kmbli -->
    <table width="230">
        @foreach($data as $b)
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><b>{{$b->Tanggal}}</b></td>
        </tr>
        <!-- <tr>
            <td>Tanggal Kembali</td>
            <td>:</td>
            <td><b>{{$b->TanggalPengembalian}}</b></td>
        </tr> -->
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td><b>{{$b->siswa->Nisn}}</b></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><b>{{$b->siswa->NamaSiswa}}</b></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><b>{{$b->Kelas}}</b></td>
        </tr>
        <tr>
            <td>Barang</td>
            <td>:</td>
            <td><b>{{$b->barang->NamaBarang}}</b></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td><b>{{$b->Jumlah}}</b></td>
        </tr><br>
        @endforeach
    </table>

    <table>
        <tr>
            <td>Telah meminjam barang di Smk Informatika Utama</td>
        </tr><br>
    </table><br>

    <div style="width: 30%; float: left;">
        <div style="margin-left: 30px;">
            Petugas
        </div><br><br><br><br>
        <div style="text-align: left;">
            {{ ucwords(Auth::user()->name) }}
        </div>
    </div>

    <div style="width: 30%; float: right;">
        <div style="margin-left: 30px;">
            Tertanda
        </div><br><br><br><br>
        <div style="text-align: right;">
            {{ $data[0]->siswa->NamaSiswa }}
        </div>
    </div>