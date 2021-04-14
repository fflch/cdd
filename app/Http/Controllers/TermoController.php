<?php

namespace App\Http\Controllers;

use App\Models\Termo;
use App\Models\Cdd;
use Illuminate\Http\Request;
use App\Http\Requests\TermoRequest;

class TermoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request) 
    {
        if(isset(request()->busca_assunto)) {
            $termos = Termo::where('assunto', 'LIKE',"%{$request->busca_assunto}%")->paginate(10);

        } else if(isset(request()->busca_observacao)) {
            $termos = Termo::where('observacao', 'LIKE',"%{$request->busca_observacao}%")->paginate(10);
        
        } else if(isset(request()->busca_categoria)) {
            $termos = Termo::where('categoria', 'LIKE',"%{$request->busca_categoria}%")->paginate(10);
        
        } else if(isset(request()->busca_enviado_para_sibi)) {
            $termos = Termo::where('enviado_para_sibi', 'LIKE',"%{$request->busca_enviado_para_sibi}%")->paginate(10);

        } else if(isset(request()->busca_normalizado)) {
            $termos = Termo::where('normalizado', 'LIKE',"%{$request->busca_normalizado}%")->paginate(10);

        } else {
            $termos = Termo::paginate(20);  
        }

        return $termos;
    } 

    public function index(Request $request)
    {
        $termos =  $this->search($request);
        return view('index',[
            'termos' => $termos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('termo.create',[
            'termo' => new termo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TermoRequest $request)
    {   
        $validated = $request->validated();
        $termo = Termo::create($validated);
        request()->session()->flash('alert-info','Registro cadastrado com sucesso');
        return redirect("/termos/{$termo->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Termo  $termo
     * @return \Illuminate\Http\Response
     */
    public function show(Termo $termo)
    {
        return view('termo.show',[
            'termo' => $termo,
        ]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Termo  $termo
     * @return \Illuminate\Http\Response
     */
    public function edit(Termo $termo)
    {
        return view('termo.edit',[
            'termo' => $termo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Termo  $termo
     * @return \Illuminate\Http\Response
     */
    public function update(TermoRequest $request, Termo $termo)
    {

        $validated = $request->validated();
        $termo->update($validated);
        request()->session()->flash('alert-info','Registro atualizado com sucesso');
        return redirect("/termos/{$termo->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Termo  $termo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Termo $termo)
    {
        $termo->delete();
        request()->session()->flash('alert-info','Registro excluído com sucesso.');
        return redirect('/');
    }

    public function addCdd(Request $request, Termo $termo)
    {
        $cdd = Cdd::where('id',$request->cdd)->first();
        $termo->cdds()->attach($cdd);
        return redirect("/termos/$termo->id");
    }

    public function removeCdd(Request $request, Termo $termo, Cdd $cdd)
    {    

        $termo->cdds()->detach($cdd->id);
        request()->session()->flash('alert-danger', "{$cdd->cdd} foi excluído(a) de {$termo->assunto}");
        return redirect("/termos/{$termo->id}");
    }
    
}
