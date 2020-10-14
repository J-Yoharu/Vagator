<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsApplicantAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_applicant_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')
                ->constrained('applicants')
                ->onUpdate('no action')
                ->onDelete('cascade');
            $table->foreignId('job_id')
                ->constrained('jobs')
                ->onUpdate('no action')
                ->onDelete('cascade');
            $table->string('attachment')->comment('anexos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_applicant_attachments');
    }
}
