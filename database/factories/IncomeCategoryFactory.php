<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IncomeCategory>
 */
class IncomeCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'category'=> fake()->randomElement($array=array('kitchen_income','room_income','pool_bar_income','laundry_income','barbeque_income','bush_bar_kitchen_income','bush_bar_income','snooker_income','pastry_income','club_income','hall_income','swimming','sharwama','showglass','other_income'), $count=1, $allowDuplicates=false),
            // 'income_amount' => fake()->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 1000),
            // 'income_date' => fake()->date($format = 'Y-m-d', $max = 'now'),
                ];
    }
}
