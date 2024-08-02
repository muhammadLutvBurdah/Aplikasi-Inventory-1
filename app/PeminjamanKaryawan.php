<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeminjamanKaryawan extends Model
{
    protected $table = 'peminjamankaryawan';
    protected $primaryKey = 'PeminjamanKaryawanID';
    protected $fillable = [
        'Nik',
        'NamaKaryawan',
        'Jabatan',
        'BarangID',
        'Petugas',
        'Status',
        'BatasPengembalian',
        'Jumlah',
        'Tanggal',
        'TanggalPengembalian',
        'JumlahKembali',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'Nik', 'Nik');
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
