<?php

namespace App\Http\Controllers;

use App\QueryFilters\Title;
use App\Repositories\JobRepository;
use App\Repositories\JobRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Department;
use App\Models\Locale;
use App\Models\Type;
use Illuminate\Pipeline\Pipeline;

class JobController extends Controller
{
    private $jobRepository;

    public function __construct(JobRepositoryInterface $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function index()
    {
        return response()->json($this->jobRepository->all()->paginate(10));
    }

    public function show(Request $request)
    {
        return response()->json($this->jobRepository->findById($request->id));
    }

    public function store(JobRequest $request)
    {
        try{
            $this->jobRepository->create($request->all());
            return response()->json(['success' => 'O cadastro foi efetuado com sucesso!']);
        }catch(Exception $ex) {
            return response()->json(['error' => 'Erro para inserir '],400);
        }
    }

    public function update(JobRequest $request)
    {
        $job = Job::find($request->id);
        if ($job) {
            $this->jobRepository->update($request->all());
            return response()->json($job);
        }
        return response()->json(['error' => 'Vaga inexistente']);
    }

    public function delete(Request $request)
    {
        $job = Job::find($request->id);
        if ($job) {
            $this->jobRepository->delete($request->id);
            return response()->json($job);
        }
        return response()->json(['error' => 'Vaga inexistente']);
    }
    public function filters()
    {
        return response()->json($this->jobRepository->filters());
    }
    public function search(Request $request)
    {
        $jobs = app(Pipeline::class)
            ->send(Job::with('department','locale','type'))
            ->through([
                \App\QueryFilters\Title::class,
                \App\QueryFilters\IsRemote::class,
                \App\QueryFilters\DepartmentId::class,
                \App\QueryFilters\TypeId::class,
                \App\QueryFilters\LocaleId::class,
            ])
            ->thenReturn();

        return response()->json($jobs->orderBy('created_at','desc')->paginate(10));
    }
}
