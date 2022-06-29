<?php

namespace App\Http\Controllers;

use App\Models\Termo;
use App\Models\Cdd;
use App\Models\Remissiva;
use Illuminate\Http\Request;
use App\Http\Requests\TermoRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class TermoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        /*
         * Campo da caixa de busca:
         * Model: Termo      campos: assunto
         * Model: Remissiva  campos: titulo
         * Model: Cdd        campos: cdd
         * 
         * Outros filtros exclusivos no model Termo:
         * - enviado_para_sibi
         * - normalizado
         * - categoria
         */

        $termos = new Termo;

        if($request->search) {
            $termos = $termos->where(function( $query ) use ( $request ){
                # Model: Termo      campos: assunto
                $query->where('assunto', 'LIKE',"%{$request->search}%")

                # Model: Remissiva  campos: titulo
                ->orWhereHas('remissivas', function (Builder $query) use ($request){
                    $query->where('titulo','LIKE',"%{$request->search}%");
                })
                
                # Model: Cdd        campos: cdd
                ->orWhereHas('cdds', function (Builder $query) use ($request){
                    $query->where('cdd','LIKE',"%{$request->search}%");
                }); 
            });
        }

        # Flag Enviado para Sibi
        if ($request->enviado_para_sibi == "1"){
            $termos = $termos->where('enviado_para_sibi',1);
        } elseif ($request->enviado_para_sibi == "0") {
            $termos = $termos->where('enviado_para_sibi',0);
        }

        # Flag Normalizado
        if ($request->normalizado == "1"){
            $termos = $termos->where('normalizado',1);
        } elseif ($request->normalizado == "0") {
            $termos = $termos->where('normalizado',0);
        }

        # Flag categoria
        if ($request->categoria){
            $termos = $termos->where('categoria','LIKE',"%{$request->categoria}%");
        }

        $termos = $termos->orderBy('assunto', 'asc')->paginate(10);

        return view('termo.index',[
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
        $this->authorize('admins');
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
        $this->authorize('admins');
        $validated = $request->validated();
        $termo = Termo::create($validated);

        $remissivas = array_filter($request->remissivas);
        foreach($remissivas as $remissiva){
            $remissiva = trim($remissiva);
            $remissiva_db = Remissiva::where('titulo',$remissiva)->where('termo_id',$termo->id)->first();
            if(!$remissiva_db) {
                $remissiva_db = new Remissiva;
                $remissiva_db->titulo = $remissiva;
                $remissiva_db->termo_id = $termo->id;
                $remissiva_db->save();
            } 
        }

        $cdds = array_filter($request->cdds);
        foreach($cdds as $cdd){
            $cdd = trim($cdd);
            $cdd_db = Cdd::where('cdd',$cdd)->first();
            if(!$cdd_db) {
                $cdd_db = new Cdd;
                $cdd_db->cdd = $cdd;
                $cdd_db->save();
            } 
            $termo->cdds()->attach($cdd_db);
        }


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
        $this->authorize('admins');
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
        $this->authorize('admins');
        $validated = $request->validated();
        $termo->update($validated);

        $remissivas = array_filter($request->remissivas);

        Remissiva::where('termo_id',$termo->id)->delete();

        foreach($remissivas as $remissiva){
            $remissiva = trim($remissiva);
                $remissiva_db = new Remissiva;
                $remissiva_db->titulo = $remissiva;
                $remissiva_db->termo_id = $termo->id;
                $remissiva_db->save();
        }

        $cdds = array_filter($request->cdds);

        // deletamos os cdds
        DB::table('cdd_termo')->where('termo_id',$termo->id)->delete();

        foreach($cdds as $cdd){
            $cdd = trim($cdd);
            $cdd_db = Cdd::where('cdd',$cdd)->first();
            if(!$cdd_db) {
                $cdd_db = new Cdd;
                $cdd_db->cdd = $cdd;
                $cdd_db->save();
            } 
            $termo->cdds()->attach($cdd_db);
        }

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
        $this->authorize('admins');
        $termo->delete();
        request()->session()->flash('alert-info','Registro excluído com sucesso.');
        return redirect('/');
    }

    public function addCdd(Request $request, Termo $termo)
    {
        $this->authorize('admins');
        $cdd = Cdd::where('id',$request->cdd)->first();
        $termo->cdds()->attach($cdd);
        return redirect("/termos/$termo->id");
    }

    public function removeCdd(Request $request, Termo $termo, Cdd $cdd)
    {    
        $this->authorize('admins');
        $termo->cdds()->detach($cdd->id);
        request()->session()->flash('alert-danger', "{$cdd->cdd} foi excluído(a) de {$termo->assunto}");
        return redirect("/termos/{$termo->id}");
    }
    
}
