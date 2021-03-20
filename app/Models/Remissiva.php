<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Record;

class Remissiva extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function record(){
        return $this->belongsTo(Record::class);
    }
}
