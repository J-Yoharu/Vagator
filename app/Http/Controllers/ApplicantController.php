<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    public function store(Request $request)
    {
        try {
         

            if (Job::find($request->job_id)) {
                DB::beginTransaction();

                $applicant = Applicant::create($request->all());
                $applicant->jobAttachments()->attach($request->job_id,['attachment' => 'teste']);
                $applicant->jobs()->attach($request->job_id);
                
                DB::commit();
                return response()->json($applicant);
            }
            return response()->json(['error' => 'A vaga não está mais disponível']);
            
        } catch(Exception $ex) {
            DB::rollBack();
        }
        
    }
}
