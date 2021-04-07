<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termo;

class IndexController extends Controller
{
    public function index()
    {   
        return view('index', [
            'termos' => Termo::orderBy('assunto')->get()
        ]);
    }
}
