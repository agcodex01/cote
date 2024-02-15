<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Consts\UserConstant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $levels = ['1st', '2nd', '3rd', '4th'];
        $semesters = ['1st', '2nd', '3rd'];

        \App\Models\User::factory()->create([
            'email' => 'test@test.com',
            'type' => UserConstant::ADMIN
        ]);

        \App\Models\Student::factory()->count(50)->create();
        \App\Models\Teacher::factory()->count(10)->create();

        \App\Models\YearLevel::insert(array_map(fn ($level) => ['name' => $level], $levels));
        \App\Models\Semester::insert(array_map(fn ($semester) => ['name' => $semester], $semesters));
    }
}
