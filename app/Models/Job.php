<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'department_id',
        'locale_id',
        'type_id',
        'is_remote',
        'description'
    ];

    protected $table = 'jobs';

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class);
    }

    public function applicantAttachments()
    {
        return $this->belongsToMany(Applicant::class,'jobs_applicant_attachments');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
}
