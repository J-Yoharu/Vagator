<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;
use App\Models\Locale;
use App\Models\Type;
use App\Models\User;

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
        return [
            'title' => $this->faker->text(30),
            'user_id' => User::select('id')->inRandomOrder()->first(),
            'department_id' => Department::select('id')->inRandomOrder()->first(),
            'locale_id' => Locale::select('id')->inRandomOrder()->first(),
            'type_id' => Type::select('id')->inRandomOrder()->first(),
            'is_remote' => rand(0,1),
            'description' => $this->faker->text(500)
        ];
    }
}
