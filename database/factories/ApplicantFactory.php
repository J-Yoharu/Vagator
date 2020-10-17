<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Applicant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ddd = $this->faker->randomNumber($nbDigits = 2);
        $phone = $this->faker->randomNumber($nbDigits = 9);
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->safeEmail(),
            'phone' => $ddd.$phone,
            'why_hire' => $this->faker->text(200),
            'knows' => $this->faker->name(),
        ];
    }
}
