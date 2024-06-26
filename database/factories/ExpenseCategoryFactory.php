<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExpenseCategory>
 */
class ExpenseCategoryFactory extends Factory
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
            'category'=> fake()->randomElement($array=array('kitchen expenses','room expenses','pool bar expenses','laundry expenses','barbeque expenses','bush_bar kitchen expenses','bush bar expenses','snooker expenses','pastry expenses','club expenses','hall expesnes','swimming expenses','sharwama expenes','showglass expenses'), $count=1, $allowDuplicates=false),
            
                ];
    }
}
