<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    public $incrementing = false; // Tandai bahwa primary key tidak auto-increment
    protected $keyType = 'string';
    protected $fillable = [
        'Nisn',
        'NamaSiswa',
        'RuangID',
        'KelasID' //Foreign Key for the Jabatan relationship
    ];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'RuangID', 'RuangID');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'KelasID', 'KelasID');
    }
}
