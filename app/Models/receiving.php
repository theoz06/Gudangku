<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receiving extends Model
{
    use HasFactory;
    protected $table = 'receiving';
    protected $fillable = ['Nama_Barang',
                          'Date',
                          'jumlahMasuk',
                          'Supplier',
                          'No_refensi',
                          'Catatan',
                          'UoM'];
    public $timestamps = false;
}
