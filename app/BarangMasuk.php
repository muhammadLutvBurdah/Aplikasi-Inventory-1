<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barangmasuk';
    protected $primaryKey = 'BarangMasukID';
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
