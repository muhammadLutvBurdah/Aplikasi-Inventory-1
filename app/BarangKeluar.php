<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barangkeluar';
    protected $primaryKey = 'BarangKeluarID';
    protected $fillable = [
        'Tanggal',
        'BarangID',
        'Jumlah',
        'Deskripsi',
        'Jenis'
    ];

    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'BarangID', 'BarangID');
    }
}
