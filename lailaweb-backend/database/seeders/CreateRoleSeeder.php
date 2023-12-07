<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'display_name' => 'Quan Tri Vien'],
            ['name' => 'guest', 'display_name' => 'Khach Hang'],
            ['name' => 'developer', 'display_name' => 'Phat Trien He Thong'],
            ['name' => 'content', 'display_name' => 'Chinh sua noi dung'],

        ]);
    }
}
