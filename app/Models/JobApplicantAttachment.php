<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class JobApplicantAttachment extends Pivot
{
    use HasFactory;

    protected $fillable = ['applicant_id', 'job_id','attachment'];

    protected $table = 'jobs_applicant_attachments';
}
