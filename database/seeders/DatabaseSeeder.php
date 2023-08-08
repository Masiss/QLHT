<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Assignment;
use App\Models\Child;
use App\Models\Guardian;
use App\Models\Point;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Guardian::factory('100')->create();
        Child::factory('100')->create();
        $this->call([
            GuardianSeeder::class,
            SubjectSeeder::class
        ]);
        Assignment::factory('300')->create();
        Schedule::factory('500')->create();
        Point::factory('300')->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
