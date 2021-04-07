<?php

namespace Database\Factories;

use App\Models\Cdd;
use Illuminate\Database\Eloquent\Factories\Factory;

class CddFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cdd::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cdd' => $this->faker->sentence(3),
        ];
    }
}
