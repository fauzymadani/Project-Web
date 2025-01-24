<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $buku = [
            ['id' => '110', 'nama_buku' => 'Sejarah Indonesia'],
            ['id' => '111', 'nama_buku' => 'Tereliye'],
            ['id' => '112', 'nama_buku' => 'Laut Bercerita'],
        ];
        DB::table('buku')->insert($buku);
    }
}
