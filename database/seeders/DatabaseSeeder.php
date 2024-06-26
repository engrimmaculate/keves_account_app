<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
use App\Models\User;
use Database\Factories\ExpenseCategoryFactory;
use Database\Factories\IncomeCatgoryFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin user',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        //  IncomeCategory::factory(10)->create();
    }
}
