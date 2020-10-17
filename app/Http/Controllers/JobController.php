<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Department;
use App\Models\Locale;
use App\Models\Type;

class JobController extends Controller
{
    public function index()
    {
        return response()->json(Job::with('department','locale','type')->get());
    }

    public function show(Request $request)
    {
        // $jobs = Job::find($request->id);
        // foreach ($jobs->applicants as $applicants) {
        //     dd($applicants->pivot);
        // }
        return response()->json(Job::with('department','locale','type')->find($request->id));
    }

    public function store(Request $request)
    {
        return response()->json(Job::create($request->all()));
    }

    public function update(Request $request)
    {   
        $job = Job::find($request->id);
        if ($job) {
            $job->update($request->all());
            return response()->json($job);
        }
        return response()->json(['error' => 'Vaga inexistente']);
    }

    public function delete(Request $request)
    {
        $job = Job::find($request->id);
        if ($job) {
            $job->delete($request->id);
            return response()->json($job);
        }
        return response()->json(['error' => 'Vaga inexistente']);
    }
    public function filter()
    {
 
        $departments = Department::select('id','department')->get();
        $locales = Locale::select('id','locale')->get();
        $types = Type::select('id','type')->get();
 
        return response()->json(
            [
                'departments' => $departments,
                'locales' => $locales,
                'types' => $types
            ]
        );
    }
}
