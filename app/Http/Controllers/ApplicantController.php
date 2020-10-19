<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApplicantController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file')->store('');

        try {
            if (Job::find($request->job_id)) {
                DB::beginTransaction();

                $applicant = Applicant::create($request->all());
                $applicant->jobAttachments()->attach($request->job_id,['attachment' => $file]);
                $applicant->jobs()->attach($request->job_id);
                
                DB::commit();
                return response()->json($applicant);
            }
            return response()->json(['error' => 'A vaga não está mais disponível'],404);
        } catch(Exception $ex) {
            DB::rollBack();
        }
        
    }
}
