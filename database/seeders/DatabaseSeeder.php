<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::truncate();
        Company::truncate();
        Employee::truncate();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        Company::factory(53)
            ->has(Employee::factory(4))
            ->create();
    }
}
