<?php


namespace App\Repositories;


use App\Models\Department;
use App\Models\Job;
use App\Models\Locale;
use App\Models\Type;
use Illuminate\Pipeline\Pipeline;

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
        try{
            Job::create($data);
            return ['success' => 'O cadastro foi efetuado com sucesso!'];
        }catch(Exception $ex) {
            return ['error' => 'Erro para inserir '];
        }
    }

    public function update($id)
    {
        $job = Job::find($id);
        if ($job) {
            $job->update(request()->all());
            return $job;
        }
        return ['error' => 'Vaga inexistente'];
    }

    public function delete($id)
    {
        $job = Job::find($id);
        if ($job) {
            $job->delete($id);
            return $job;
        }
        return ['error' => 'Vaga inexistente'];
    }

    public function getFilters()
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

    public function filter(){
        return app(Pipeline::class)
            ->send(Job::with('department','locale','type'))
            ->through([
                \App\QueryFilters\Title::class,
                \App\QueryFilters\IsRemote::class,
                \App\QueryFilters\DepartmentId::class,
                \App\QueryFilters\TypeId::class,
                \App\QueryFilters\LocaleId::class,
            ])
            ->thenReturn();
    }
}
