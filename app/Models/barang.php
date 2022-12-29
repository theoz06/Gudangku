<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['Nama_barang',
                           'Brand', 
                           'UoM',
                           'Price',
                           'Kategori',
                           'Gambar',
                           'Catatan',
                           'jPengiriman'];
    public $timestamps = false;
}
