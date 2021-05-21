<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Termo;
use OwenIt\Auditing\Contracts\Auditable;

class Remissiva extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];

    public function termo(){
        return $this->belongsTo(Termo::class);
    }
}
