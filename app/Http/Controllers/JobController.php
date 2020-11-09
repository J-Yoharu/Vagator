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
        return response()->json($this->jobRepository->create($request->all()));

    }

    public function update(JobRequest $request)
    {
        $this->jobRepository->update($request->id);
    }

    public function delete(Request $request)
    {
        return response()->json($this->jobRepository->delete($request->id));
    }

    public function filters()
    {
        return response()->json($this->jobRepository->getFilters());
    }

    public function search(Request $request)
    {
        $jobs = $this->jobRepository->filter()->orderBy('created_at','desc')->paginate(10);
        return response()->json($jobs);
    }
}
