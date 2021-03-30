<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\Speciality;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Speciality::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->getCode(),
            'name' => $this->faker->name,
            'faculty_id' => function () {
                return Faculty::factory()->create()->id;
            },
        ];
    }

    private function getCode(): string
    {
        return $this->faker->numberBetween(1, 99) . "."
            . $this->faker->numberBetween(1, 99) . "."
            . $this->faker->numberBetween(1, 99);
    }
}
