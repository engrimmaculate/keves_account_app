<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_no' => fake()->randomNumber($nbDigits = NULL, $strict = false),
            'account_type' => fake()->randomElement($array=array('Petty Cash','Sales','Income','Expense','Regular Checking Account','Pay Roll'), $count=1, $allowDuplicates=true),
            'acct_beginning_balance' => fake()->numberBetween($min=10000, $max=500000),
            'description' =>fake()->sentence($nbWords = 6, $variableNbWords = true),
        ];
    }
}
