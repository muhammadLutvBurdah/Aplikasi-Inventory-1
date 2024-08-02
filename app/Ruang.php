<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruang';
    protected $primaryKey = 'RuangID';
    protected $fillable = [
        'NamaRuang'
    ];



    public function products()
    {
        return $this->hasMany(Product::class, 'RuangID', 'RuangID');
    }
}
