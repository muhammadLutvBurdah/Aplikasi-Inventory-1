<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamankaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamankaryawan', function (Blueprint $table) {
            $table->bigIncrements('PeminjamanKaryawanID');
            $table->unsignedBigInteger('Nik');
            $table->unsignedBigInteger('BarangID');
            $table->string('Petugas')->nullable();
            $table->string('Status')->default('Menetap', 'Kembali');
            $table->date('BatasPengembalian')->nullable();
            $table->string('Jumlah');
            $table->date('Tanggal');
            $table->date('TanggalPengembalian')->nullable();
            $table->string('JumlahKembali')->nullable();
            $table->timestamps();

            // Menambahkan kolom-kolom yang akan diambil dari tabel siswa
            $table->string('NamaKaryawan')->nullable();
            $table->string('Jabatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamankaryawan');
    }
}
