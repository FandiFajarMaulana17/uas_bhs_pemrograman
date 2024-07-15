<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataMarketingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timstamp = \Carbon\Carbon::now()->toDateString();
        DB::table('data_marketings')->insert([
            [
            'nama_karyawan' => 'admin',
            'product' => 'pulpen keren',
            'jumlah' => '100',
            'harga' =>  '25000',
            'keterangan_penjualan' => 'pulpen ini sangat keren dan ingin di distribusikan ke seluruh indonesia',
            'keterangan_produk' =>  'pulpen merek pt fandi',
            'target_pasar' =>   'seluruh indonesia',
            'created_at' => $timstamp,
            'updated_at' => $timstamp,
            ]
        ]);
    }
}
