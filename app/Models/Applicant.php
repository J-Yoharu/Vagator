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
        return $this->belongsToMany(Job::class);
    }

    public function jobAttachments()
    {
        return $this->belongsToMany(Job::class,'jobs_applicant_attachments');
    }
}
