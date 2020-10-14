<?php

namespace Database\Seeders;
use App\Models\Job;
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
            ->count(10)
            ->create();
    }
}
