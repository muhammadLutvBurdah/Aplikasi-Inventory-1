<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamansiswa', function (Blueprint $table) {
            $table->bigIncrements('PeminjamanSiswaID');
            $table->unsignedBigInteger('Nisn');
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
            $table->string('NamaSiswa')->nullable();
            $table->string('Kelas')->nullable();
            $table->string('Ruang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamansiswa');
    }
}
