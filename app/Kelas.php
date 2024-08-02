<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'KelasID';
    protected $fillable = [
        'NamaKelas'
    ];



    public function products()
    {
        return $this->hasMany(Product::class, 'KelasID', 'KelasID');
    }
}
