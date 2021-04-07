<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Termo;

class Remissiva extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function termo(){
        return $this->belongsTo(Termo::class);
    }
}
