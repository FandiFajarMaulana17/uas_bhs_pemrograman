<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_marketings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->string('product');
            $table->string('jumlah');
            $table->biginteger('harga');
            $table->longText('keterangan_penjualan');
            $table->longtext('keterangan_produk');
            $table->longText('target_pasar');
            $table->timestamps();
        });
    }

};
