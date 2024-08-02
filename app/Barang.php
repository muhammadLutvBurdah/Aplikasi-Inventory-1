<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'BarangID';
    protected $fillable =[
        'NamaBarang',
        'StockQuantity' 
    ];
}
