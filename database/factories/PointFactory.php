<?php

namespace Database\Factories;

use App\Models\Child;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_id'=>Child::query()->inRandomOrder()->value('id'),
            'subject_id'=>Subject::query()->inRandomOrder()->value('id'),
            'daily'=>rand(1,10),
            'weekly'=>rand(1,10),
            'midSem'=>rand(1,10),
            'endSem'=>rand(1,10),
        ];
    }
}
