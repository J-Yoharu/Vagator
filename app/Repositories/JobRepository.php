<?php


namespace App\Repositories;


use App\Models\Job;

class JobRepository
{
    public function all()
    {
        return Job::with('department','locale','type')->orderBy('created_at', 'desc');
    }

    public function findById($JobId){
        return Job::with('department','locale','type')->find($JobId);
    }
}
