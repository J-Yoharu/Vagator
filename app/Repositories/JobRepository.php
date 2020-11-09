<?php


namespace App\Repositories;


use App\Models\Department;
use App\Models\Job;
use App\Models\Locale;
use App\Models\Type;

class JobRepository implements JobRepositoryInterface
{
    public function all()
    {
        return Job::with('department','locale','type')->orderBy('created_at', 'desc');
    }

    public function findById($JobId)
    {
        return Job::with('department','locale','type')->find($JobId);
    }

    public function create($data)
    {
        Job::create($data);
    }

    public function update($data)
    {
        Job::update($data);
    }

    public function delete($id)
    {
        Job::delete($id);
    }

    public function filters()
    {
        $departments = Department::select('id','department')->get();
        $locales = Locale::select('id','country', 'state', 'city')->get();
        $types = Type::select('id','type')->get();

        return [
            'departments' => $departments,
            'locales' => $locales,
            'types' => $types
        ];
    }
}
