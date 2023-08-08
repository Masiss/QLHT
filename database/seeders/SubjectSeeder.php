<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')
            ->insert([
                'name' => 'Toán'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Anh'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Lý'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Hóa'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Sinh'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Sử'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Địa'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Thể chất'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'GDCD'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Văn'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Công nghệ'
            ]);
        DB::table('subjects')
            ->insert([
                'name' => 'Tin học'
            ]);
    }
}
