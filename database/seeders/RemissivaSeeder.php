<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Remissiva;

class RemissivaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $remissiva = [
            'titulo' => "ABELARDO, PEDRO",
            'termo_id' => 1,
        ];
        Remissiva::create($remissiva);
        Remissiva::factory(20)->create();
    }
}
