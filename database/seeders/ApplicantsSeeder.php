<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\JobApplicantAttachment;

class ApplicantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Applicant::factory()->count(10)
            ->has(Job::factory()->count(2))
            ->hasJobAttachments()
            ->create();
    }
}
