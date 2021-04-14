<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Termo;

class TermoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $categorias = Termo::categorias();
        $termo = [
            'assunto' => "ABELARDO, PEDRO, filósofo e teólogo escolástico francês 1079-1142",
            'enviado_para_sibi' => TRUE,
            'normalizado' => TRUE,
            'observacao' => "189.4 A139",
            'categoria' => $categorias[2]
        ];
        Termo::create($termo);
        Termo::factory(20)->create();
    }
}
