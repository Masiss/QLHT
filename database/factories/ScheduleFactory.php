<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $arr = [];
        for ($i = 1; $i <= 101; $i++) {
            for ($j = 0; $j <= 5; $j++) {
                for ($k = 1; $k <= 10; $k++) {
                    array_push($arr, $i . "-" . $j . "- " . $k);

                }
            }
        }

        $rand = $this->faker->unique->randomElement($arr);

        $split = explode('-', $rand);
        $child = $split[0];
        $week_day = $split[1];
        $shift = $split[2];


        return [
            'child_id' => $child,
            'week_day' => $week_day,
            'shift' => $shift,
            'subject_id' => Subject::query()->inRandomOrder()->value('id'),
        ];
    }
}
