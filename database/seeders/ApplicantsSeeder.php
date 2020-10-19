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
       dd(Applicant::factory()->count(10)
            ->hasJobs(2)
            // ->hasJobAttachments(['attachment' => 'Teste'])
            ->make());
    }
}
