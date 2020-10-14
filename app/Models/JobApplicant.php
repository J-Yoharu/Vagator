<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    use HasFactory;

    protected $fillable = ['applicant_id','job_id'];

    protected $table = 'jobs_applicants';

    public function jobs()
    {
        return $this->belongsTo(Jobs::class);
    }

    public function applicants()
    {
        return $this->belongsTo(Applicants::class);
    }
}
