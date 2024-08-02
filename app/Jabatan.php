<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'JabatanID';
    protected $fillable = [
        'NamaJabatan'
    ];



    public function products()
    {
        return $this->hasMany(Product::class, 'JabatanID', 'JabatanID');
    }
}
