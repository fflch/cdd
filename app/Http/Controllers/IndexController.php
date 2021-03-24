<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class IndexController extends Controller
{
    public function index()
    {   
        return view('index', [
            'records' => Record::orderBy('assunto')->get()
        ]);
    }
}
