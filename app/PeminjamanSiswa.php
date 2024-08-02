<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeminjamanSiswa extends Model
{
    protected $table = 'peminjamansiswa';
    protected $primaryKey = 'PeminjamanSiswaID';
    protected $fillable = [
        'Nisn',
        'NamaSiswa',
        'Kelas',
        'Ruang',
        'BarangID',
        'Petugas',
        'Status',
        'BatasPengembalian',
        'Jumlah',
        'Tanggal',
        'TanggalPengembalian',
        'JumlahKembali',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'Nisn', 'Nisn');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'BarangID', 'BarangID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
