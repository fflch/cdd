<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cdd;

class CddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cdd = [
            'cdd' => "189.4 A139 (Filosofia da Arte)",
        ];
        Cdd::create($cdd);
        Cdd::factory(20)->create();
    }
}
