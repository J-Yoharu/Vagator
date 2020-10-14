<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $actuationFields = ['Marketing','Tecnologia','Financeiro'];
        $jobTypes = ['Período Integral','Estágio','Meio Período'];
        return [
            'title' => $this->faker->text(30),
            'actuation_field' => $actuationFields[rand(0,2)],
            'locale' => 'São Paulo, SP, Brasil',
            'job_type' => $jobTypes[rand(0,2)],
            'is_remote' => rand(0,1),
            'description' => $this->faker->text(500)
        ];
    }
}
