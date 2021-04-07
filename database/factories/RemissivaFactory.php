<?php

namespace Database\Factories;

use App\Models\Remissiva;
use Illuminate\Database\Eloquent\Factories\Factory;

class RemissivaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Remissiva::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'termo_id' => $this->faker->numberBetween($min = 1, $max = 20),
        ];
    }
}
