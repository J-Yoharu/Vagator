<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantJob extends Model
{
    use HasFactory;

    protected $fillable = ['applicant_id','job_id'];

    protected $table = 'applicant_job';
}
