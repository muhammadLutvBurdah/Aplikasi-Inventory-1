<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'Nik';
    public $incrementing = false; // Tandai bahwa primary key tidak auto-increment
    protected $keyType = 'string';
    protected $fillable = [
        'Nik',
        'Email',
        'NamaKaryawan',
        'JabatanID',
        'NoTelp',
        'Alamat'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'JabatanID', 'JabatanID');
    }
}
