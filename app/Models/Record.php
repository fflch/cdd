<?php

namespace App\Models;
use App\Models\Remissiva;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function categorias(){
        return [
            'Assunto',
            'Coleção',
            'Autor',
        ];
    }

    public function remissivas()
    {
        return $this->hasMany(Remissiva::class);
    }
}
