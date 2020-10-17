<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Locale;
use App\Models\Type;
use App\Models\Department;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Locale::factory()->count(10)->create();
        Type::factory()->count(10)->create();
        Department::factory()->count(10)->create();
        Job::factory()->count(10)->create();
    }
}
