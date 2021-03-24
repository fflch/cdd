<?php

namespace App\Http\Controllers;

use App\Models\Remissiva;
use Illuminate\Http\Request;
use App\Http\Requests\RemissivaRequest;

class RemissivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remissivas =  Remissiva::orderBy('texto')->get();
        return view('remissiva.index',[
            'remissivas' => $remissivas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('remissiva.create',[
            'remissiva' => new Remissiva,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RemissivaRequest $request)
    {
        $validated = $request->validated();
        $remissiva = Remissiva::create($validated);
        request()->session()->flash('alert-info','Remissiva adicionada com sucesso');
        return redirect("/remissivas/{$remissiva->id}");    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Remissiva  $remissiva
     * @return \Illuminate\Http\Response
     */
    public function show(Remissiva $remissiva)
    {
        return view('remissiva.show',[
            'remissiva' => $remissiva,
        ]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Remissiva  $remissiva
     * @return \Illuminate\Http\Response
     */
    public function edit(Remissiva $remissiva)
    {
        return view('remissiva.edit',[
            'remissiva' => $remissiva
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Remissiva  $remissiva
     * @return \Illuminate\Http\Response
     */
    public function update(RemissivaRequest $request, Remissiva $remissiva)
    {
        $validated = $request->validated();
        $remissiva->update($validated);
        request()->session()->flash('alert-info','Remissiva atualizada com sucesso');
        return redirect("/remissivas/{$remissiva->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remissiva  $remissiva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remissiva $remissiva)
    {
        $remissiva->delete();
        request()->session()->flash('alert-info','Remissiva excluída com sucesso.');
        return redirect("/remissivas");
    }
}
