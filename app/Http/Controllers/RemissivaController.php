<?php

namespace App\Http\Controllers;

use App\Models\Remissiva;
use Illuminate\Http\Request;
use App\Http\Requests\RemissivaRequest;

class RemissivaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RemissivaRequest $request)
    {
        $this->authorize('admin');
        $validated = $request->validated();
        $remissiva = Remissiva::create($validated);
        request()->session()->flash('alert-info','Remissiva adicionada com sucesso');
        return redirect("/termos/{$remissiva->termo_id}");    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remissiva  $remissiva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remissiva $remissiva)
    {
        $this->authorize('admin');
        $termo_id = $remissiva->termo_id;
        $remissiva->delete();
        request()->session()->flash('alert-info','Remissiva excluída com sucesso.');
        return redirect("/termos/{$termo_id}");
    }
}
