<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'email', 'phone', 'why_hire', 'knows'];
    
    protected $table = 'applicants';

    public function jobs()
    {
        return $this->hasOne(ApplicantJob::class);
    }

    public function attachments()
    {
        return $this->hasMany(JobApplicantAttachment::class);
    }
}
