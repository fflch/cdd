<?php

namespace App\Http\Controllers;

use App\Models\Termo;
use App\Models\Cdd;
use App\Models\Remissiva;
use Illuminate\Http\Request;
use App\Http\Requests\TermoRequest;
use Illuminate\Database\Eloquent\Builder;

class TermoController extends Controller
{
    private $campos = Termo::campos;

    public function search(){
        $request = request();
        $termos = Termo::with('remissivas','cdds')->orderBy('assunto', 'asc');

        $termos->when($request->campos == 'assunto', function($query) use ($request) {
            $query->where('assunto','LIKE', '%'. $request->search .'%')->str_replace('(','', $request->search);
        });

        $termos->when($request->campos == 'cdd', function($query) use ($request) {
            $query->WhereHas('cdds', function (Builder $query) use ($request){
                $query->where('cdd','LIKE', '%'.$request->search.'%');
            });
        });

        $termos->when($request->campos == 'remissiva', function($query) use ($request) {
            $query->WhereHas('remissivas', function (Builder $query) use ($request){
                $query->where('titulo','LIKE', '%'.$request->search.'%');
            });
        });

        $termos->when($request->enviado_para_sibi, function($query) use ($request){
            $query->where('enviado_para_sibi', '=', $request->enviado_para_sibi);
        });

        $termos->when($request->normalizado, function($query) use ($request){
            $query->where('normalizado', '=', $request->normalizado);
        });

        $termos->when($request->categoria, function($query) use ($request){
            $query->where('categoria', '=', $request->categoria);
        });

        return $termos->orderBy('assunto', 'desc')->paginate(20);
    }

    public function index(Request $request){
        $termos = $this->search();

        return view('termo.index',[
            'campos' => $this->campos,
            'termos'  => $termos,
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
            'termo' =>  $termo,
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
            'termo' => $termo,
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
        $termo->update($request->validated());

        $remissivas = array_filter($request->remissivas);

        Remissiva::where('termo_id',$termo->id)->delete();

        foreach($remissivas as $remissiva){
            $remissiva = trim($remissiva);
                $remissiva_db = new Remissiva;
                $remissiva_db->titulo = $remissiva;
                $remissiva_db->termo_id = $termo->id;
                $remissiva_db->save();
                $termo->assunto = $termo->assunto;
                $termo->save();
        }

        $cdds = array_filter($request->cdds);

        $cdd_ids = array();
        foreach($cdds as $cdd){
            $cdd_db = Cdd::firstOrCreate(
                ['cdd' => trim($cdd)],
            );
            $cdd_ids[] = $cdd_db->id;
        }
        $termo->cdds()->sync($cdd_ids);

        return redirect()->back();
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
