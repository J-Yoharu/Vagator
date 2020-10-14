<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        return response()->json(Job::all());
    }

    public function show(Request $request)
    {
        $jobs = Job::find($request->id);
        foreach ($jobs->applicants as $applicants) {
            dd($applicants->pivot);
        }
        // return response()->json(Job::find($request->id));
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
}
