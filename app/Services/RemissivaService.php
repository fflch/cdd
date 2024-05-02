<?php

namespace App\Services;

use App\Models\Remissiva;
use Illuminate\Http\Request;

class RemissivaService
{
    public static function handle(Array $remissivas, Int $termo_id): void {

        foreach(array_unique(array_filter($remissivas)) as $remissiva){
            $remissiva_db = new Remissiva;
            $remissiva_db->titulo = trim($remissiva);
            $remissiva_db->termo_id = $termo_id;
            $remissiva_db->save();
        }

    }

}
