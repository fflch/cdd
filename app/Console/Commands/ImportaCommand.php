<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Termo;
use App\Models\Remissiva;
use App\Models\Cdd;

class ImportaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo("Iniciando importação...\n");
        $csv = array_map('str_getcsv', file(base_path() . '/DATA-EXPORT/cdd_normalizado.csv'));
        foreach($csv as $row){
            $termo = new Termo;
            $termo->assunto = $row[0];
            $termo->observacao = $row[3];
            $termo->categoria = $row[4];

            if ($row[5] == 'Enviado para SIBI') {
                $termo->enviado_para_sibi = 1;          
            } elseif ($row[5] == 'Não enviado') {
                $termo->enviado_para_sibi = 0;
            } else {
                $termo->enviado_para_sibi = NULL;
            }

            if ($row[6] == 'Normalizado') {
                $termo->normalizado = 1;          
            } elseif ($row[6] == 'Não normalizado') {
                $termo->normalizado = 0;
            } else {
                $termo->normalizado = NULL;
            }
            
            $termo->save();

            if(!empty($row[7])){
                $remissiva = new Remissiva;
                $remissiva->titulo = $row[7];
                $remissiva->termo_id = $termo->id;
                $remissiva->save();
            }

            if(!empty($row[1])){
                # verifica se ele já existe
                $cdd = Cdd::where('cdd',$row[1])->first();
                if(!$cdd) {
                    $cdd = Cdd::create(['cdd' => $row[1]]);
                } 
                
                $termo->cdds()->attach($cdd);
                $termo->save();
            }
        }
        echo("Importação completa.\n");
        return 0;
    }
}
