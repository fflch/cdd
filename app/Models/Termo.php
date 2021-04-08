<?php

namespace App\Models;
use App\Models\Remissiva;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termo extends Model
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

    public function cdds()
    {
        return $this->belongsToMany('App\Models\Cdd', 'cdd_termo')->withTimestamps();
    }
}
