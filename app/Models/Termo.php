<?php

namespace App\Models;
use App\Models\Remissiva;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Utils\Mapeamento;

class Termo extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];

    const campos = [
        'assunto'       => 'Assunto',
        'cdd'           => 'CDD'
    ];

    public static function categorias(){
        return [
            'Assunto',
            'Coleção',
            'Autor',
        ];
    }

    public function remissivas()
    {
        return $this->hasMany(Remissiva::class)->orderby('titulo', 'asc');
    }

    public function cdds()
    {
        return $this->belongsToMany('App\Models\Cdd', 'cdd_termo')->withTimestamps()->orderby('cdd', 'asc');
    }

    public function mapeamento($chave) {
        return Mapeamento::map($chave);
    }
}
