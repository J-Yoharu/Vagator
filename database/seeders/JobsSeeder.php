<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::factory()
            ->count(10)->has(Applicant::factory())
            ->create();
    }
}
