<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => '110', 'roles' => 'kebersihan'],
            ['id' => '111', 'roles' => 'keamanan'],
            ['id' => '112', 'roles' => 'jemput bola'],
        ];
        DB::table('roles')->insert($roles);
    }
}
