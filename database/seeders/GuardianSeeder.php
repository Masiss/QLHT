<?php

namespace Database\Seeders;

use App\Models\Guardian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guardians')->insert([
            'name' => 'alooo',
            'email' => 'alo@alo',
            'password' => Hash::make('123')
        ]);
        DB::table('children')->insert([
            'name' => 'alooo',
            'email' => 'alo123@alo',
            'password' => Hash::make('123'),
            'guardian_id' => Guardian::query()->inRandomOrder()->value('id')
        ]);
    }
}
