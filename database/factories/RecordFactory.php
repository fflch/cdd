<?php

namespace Database\Factories;

use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Record::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   $categorias = Record::categorias();
        return [
            'assunto' => $this->faker->sentence(3),
            'enviado_para_sibi' => array_rand([TRUE, FALSE]),
            'normalizado' => array_rand([TRUE, FALSE]),
            'observacao' => $this->faker->text(100),
            'classificacao' => $this->faker->word,
            'categoria' => $categorias[array_rand($categorias)],
        ];
    }
}
