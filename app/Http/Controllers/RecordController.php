<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use App\Http\Requests\RecordRequest;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request) 
    {
        if(isset(request()->busca_assunto)) {
            $records = Record::where('assunto', 'LIKE',"%{$request->busca_assunto}%")->paginate(10);

        } else if(isset(request()->busca_observacao)) {
            $records = Record::where('observacao', 'LIKE',"%{$request->busca_observacao}%")->paginate(10);
        
        } else if(isset(request()->busca_categoria)) {
            $records = Record::where('categoria', 'LIKE',"%{$request->busca_categoria}%")->paginate(10);
        
        } else if(isset(request()->busca_enviado_para_sibi)) {
            $records = Record::where('enviado_para_sibi', 'LIKE',"%{$request->busca_enviado_para_sibi}%")->paginate(10);

        } else if(isset(request()->busca_normalizado)) {
            $records = Record::where('normalizado', 'LIKE',"%{$request->busca_normalizado}%")->paginate(10);

        } else {
            $records = Record::paginate(20);  
        }
        /* dd($records); */
        return $records;
    } 

    public function index(Request $request)
    {
        $records =  $this->search($request);
        return view('index',[
            'records' => $records,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record.create',[
            'record' => new Record,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordRequest $request)
    {   
        $validated = $request->validated();
        $record = Record::create($validated);
        request()->session()->flash('alert-info','Registro cadastrado com sucesso');
        return redirect("/records/{$record->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        return view('record.show',[
            'record' => $record,
        ]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        return view('record.edit',[
            'record' => $record
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(RecordRequest $request, Record $record)
    {

        $validated = $request->validated();
        $record->update($validated);
        request()->session()->flash('alert-info','Registro atualizado com sucesso');
        return redirect("/records/{$record->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        $record->delete();
        request()->session()->flash('alert-info','Registro excluído com sucesso.');
        return redirect('/records');
    }
}
