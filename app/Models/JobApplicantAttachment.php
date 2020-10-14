<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicantAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['applicant_id','job_id','attachment'];

    protected $table = 'jobs_applicant_attachments';

    public function jobs()
    {
        return $this->hasMany(Jobs::class);
    }
}
