<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Record;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $categorias = Record::categorias();
        $record = [
            'assunto' => "ABELARDO, PEDRO, filósofo e teólogo escolástico francês 1079-1142",
            'enviado_para_sibi' => TRUE,
            'normalizado' => TRUE,
            'observacao' => "189.4 A139",
            'classificacao' => "Seed",
            'categoria' => $categorias[2]
        ];
        Record::create($record);
        Record::factory(20)->create();
    }
}
