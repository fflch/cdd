<?php

namespace App\Http\Controllers;

use App\Models\Cdd;
use Illuminate\Http\Request;
use App\Http\Requests\CddRequest;

class CddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cdds =  Cdd::paginate(20);
        return view('cdd.index',[
            'cdds' => $cdds,
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('cdd.create',[
            'cdd' => new Cdd,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CddRequest $request)
    {
        $this->authorize('admin');
        $validated = $request->validated();
        $cdd = Cdd::create($validated);
        request()->session()->flash('alert-info','CDD cadastrado com sucesso');
        return redirect("/cdd/{$cdd->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cdd  $cdd
     * @return \Illuminate\Http\Response
     */
    public function show(Cdd $cdd)
    {
        return view('cdd.show',[
            'cdd' => $cdd,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cdd  $cdd
     * @return \Illuminate\Http\Response
     */
    public function edit(Cdd $cdd)
    {
        $this->authorize('admin');
        return view('cdd.edit',[
            'cdd' => $cdd
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cdd  $cdd
     * @return \Illuminate\Http\Response
     */
    public function update(CddRequest $request, Cdd $cdd)
    {
        $this->authorize('admin');
        $validated = $request->validated();
        $cdd->update($validated);
        request()->session()->flash('alert-info','CDD atualizado com sucesso');
        return redirect("/cdd/{$cdd->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cdd  $cdd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cdd $cdd)
    {
        $this->authorize('admin');
        $cdd->delete();
        request()->session()->flash('alert-info','CDD excluído com sucesso.');
        return redirect('/');
    }
}
