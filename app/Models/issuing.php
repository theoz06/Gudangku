<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issuing extends Model
{
    use HasFactory;
    protected $table = 'issuing';
    protected $fillable = ['Nama_Barang',
                          'Date',
                          'jumlahKeluar',
                          'Picker',
                          'No_refensi',
                          'Catatan',
                          'UoM'];
    public $timestamps = false;
}
