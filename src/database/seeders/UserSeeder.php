<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $timstamp = \Carbon\Carbon::now()->toDateString();
        DB::table('users')->insert([
            [
            'username' => 'admin',
            'password' => 'password',
            'created_at' => $timstamp,
            'updated_at' => $timstamp,
            ],
            [
            'username' => 'guest',
            'password' => 'password',
            'created_at' => $timstamp,
            'updated_at' => $timstamp,
            ],
            [
            'username' => 'karyawan',
            'password' => 'password',
            'created_at' => $timstamp,
            'updated_at' => $timstamp,
            ]
        ]);
    }
}
