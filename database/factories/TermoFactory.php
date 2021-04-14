<?php

namespace Database\Factories;

use App\Models\Termo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TermoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Termo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   $categorias = Termo::categorias();
        return [
            'assunto' => $this->faker->sentence(3),
            'enviado_para_sibi' => array_rand([TRUE, FALSE]),
            'normalizado' => array_rand([TRUE, FALSE]),
            'observacao' => $this->faker->text(100),
            'categoria' => $categorias[array_rand($categorias)],
        ];
    }

}
