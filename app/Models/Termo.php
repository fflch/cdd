<?php

namespace App\Models;
use App\Models\Remissiva;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Termo extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
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
