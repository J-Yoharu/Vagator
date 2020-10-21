<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Department;
use App\Models\Locale;
use App\Models\Type;

class JobController extends Controller
{
    public function index()
    {   
        return response()->json(Job::with('department','locale','type')->orderBy('created_at', 'desc')->paginate(10));
    }

    public function show(Request $request)
    {
        return response()->json(Job::with('department','locale','type')->find($request->id));
    }

    public function store(JobRequest $request)
    {
        try{
            Job::create($request->all());
            return response()->json(['success' => 'O cadastro foi efetuado com sucesso!']);
        }catch(Exception $ex) {
            return response()->json(['error' => 'Erro para inserir '],400);
        }
    }

    public function update(JobRequest $request)
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
    public function filters()
    {
        $departments = Department::select('id','department')->get();
        $locales = Locale::select('id','country', 'state', 'city')->get();
        $types = Type::select('id','type')->get();
 
        return response()->json(
            [
                'departments' => $departments,
                'locales' => $locales,
                'types' => $types
            ]
        );
    }
    public function search(Request $request)
    {   
        $jobs = Job::with('department','locale','type')->where('title','like','%'. $request->title .'%');

        if($request->remote == 'true'){
            $jobs->where('is_remote',1);
        }
        if($request->department != null){
            $jobs->where('department_id', $request->department);
        }
        if($request->type != null){
            $jobs->where('type_id', $request->type);
        }
        if($request->locale != null){
            $jobs->where('locale_id', $request->locale);
        }
        
        return response()->json($jobs->orderBy('created_at','desc')->paginate(10));
    }
}
