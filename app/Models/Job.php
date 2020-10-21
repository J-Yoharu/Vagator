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
        'description',
        'user_id'
    ];

    protected $table = 'jobs';

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
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
