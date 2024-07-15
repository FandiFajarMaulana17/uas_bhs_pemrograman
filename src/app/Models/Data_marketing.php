<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data_marketing extends Model
{
    protected $table = 'data_marketings';
    protected $fillable = [
        'nama_karyawan',
        'product',
        'jumlah',
        'harga',
        'keterangan_penjualan',
        'keterangan_produk',
        'target_pasar',
    ];
}
