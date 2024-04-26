<?php

namespace App\Services;

use App\Models\Termo;
use App\Models\Remissiva;
use Illuminate\Http\Request;

class TermoService
{
    /**
     * Register services.
     *
     * @return void
     */
    public static function search(Request $request)
    {

        $query = Termo::query();

        $query->when($request->search, function($q) use ($request) {
            $termo_ids = self::search_remissiva($request->search);
            $ids = self::search_termo($request->search);
            $id = $ids->merge($termo_ids)->unique();
            $q->whereIn('id', $id);
        });

        $query->when($request->categoria, function($q) use ($request){
            $q->where('categoria', '=', $request->categoria);
        });

        $query->when($request->enviado_para_sibi, function($q) use ($request){
            $q->where('enviado_para_sibi', '=', $request->enviado_para_sibi);
        });

        $query->when($request->normalizado, function($q) use ($request){
            $q->where('normalizado', '=', $request->normalizado);
        });

        return $query->with('remissivas','cdds')->orderBy('assunto', 'asc')->paginate(10);

    }

    private static function search_remissiva($search)
    {
        return Remissiva::select('termo_id')
            ->where('titulo','like', '%' . $search . '%')->get()->pluck('termo_id');
    }

    private static function search_termo($search)
    {
        return Termo::select('id')
            ->where('assunto','LIKE', '%' . $search . '%')->get()->pluck('id');
    }


}
