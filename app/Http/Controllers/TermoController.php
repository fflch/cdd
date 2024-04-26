<?php

namespace App\Http\Controllers;

use App\Models\Termo;
use App\Models\Cdd;
use App\Models\Remissiva;
use Illuminate\Http\Request;
use App\Http\Requests\TermoRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Services\TermoService;
use App\Http\Requests\SearchCDDRequest;

class TermoController extends Controller
{

    public function search(Request $request){
        return view('termo.index',[
            'termos' => TermoService::search($request),
            'search' => $request->search,
        ]);
    }

    public function index(){
        return view('termo.index',[
            'termos'  => Termo::with('remissivas','cdds')->orderBy('assunto', 'asc')->paginate(10),
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
        $termo = Termo::create($request->validated());

        foreach(array_filter($request->cdds) as $cdd) {
            $cdd = Cdd::firstOrCreate(['cdd' => trim($cdd)]);
            $termo->cdds()->attach($cdd->id);
        }

        foreach(array_filter($request->remissivas) as $remissiva){
            $remissiva = trim($remissiva);
            $remissiva_db = Remissiva::where('titulo', $remissiva)->where('termo_id', $termo->id)->first();
            if(!$remissiva_db) {
                $remissiva_db = new Remissiva;
                $remissiva_db->titulo = $remissiva;
                $remissiva_db->termo_id = $termo->id;
                $remissiva_db->save();
            }
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

    public function pesquisacdd(){
        return view('termo.pesquisacdd',[
            'termos'  => Termo::with('remissivas','cdds')->orderBy('assunto', 'asc')->paginate(10),
        ]);
    }

    public function searchcdd(SearchCDDRequest $request){
        $termos = Termo::with('remissivas','cdds')->wherehas('cdds', function($query) use ($request) {
            $query->where('cdd', 'LIKE', $request->search . '%');
        })->paginate(10);

        return view('termo.pesquisacdd',[
            'termos' => $termos,
            'search' => $request->search,
        ]);
    }

    public function pesquisabooleana(){
        return view('termo.pesquisabooleana',[
            'termos'  => Termo::with('remissivas','cdds')->orderBy('assunto', 'asc')->paginate(10),
            'campos' => Termo::campos,
        ]);
    }

    public function searchbooleana(Request $request) {
        $termos = Termo::with('remissivas','cdds')->orderBy('assunto', 'asc');
        foreach($request->campos as $key => $value) {
            $termos->when(!is_null($value) && !is_null($request->search[$key]),
                function($query) use ($request, $key, $value) {
                    if($value == 'assunto' OR $value == 'observacao') {
                        $query->where($value, 'LIKE', '%' . $request->search[$key] . '%');
                    }
                    if($value == 'titulo') {
                        $query->wherehas('remissivas', function($query) use ($request, $key, $value) {
                            $query->where($value, 'LIKE', '%' . $request->search[$key] . '%');
                        });
                    }
                    if($value == 'cdd') {
                        $query->wherehas('cdds', function($query) use ($request, $key, $value) {
                            $query->where($value, 'LIKE', $request->search[$key] . '%');
                        });
                    }
                }
            );
        }

        return view('termo.pesquisabooleana',[
            'termos'  => $termos->paginate(10),
            'campos' => Termo::campos,
        ]);
    }

}
