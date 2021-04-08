<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cdd extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function termos()
    {
        return $this->belongsToMany('App\Models\Termo', 'cdd_termo')->withTimestamps();
    }
}
