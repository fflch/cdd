<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Termo;
use App\Models\Remissiva;
# Namespace da tabela pivot

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
        $csv = array_map('str_getcsv', file('DATA-EXPORT/cdd.csv'));
        foreach($csv as $row){
            $termo = new Termo;
            $termo->assunto = $row[0];
            $termo->observacao = $row[3];
            $termo->categoria = $row[4];
            $termo->enviado_para_sibi = $row[5];
            $termo->normalizado = $row[6];
            $termo->save();

            if(!empty($row[7])){
                $remissa = new Remissiva;
                $remissa->titulo = $row[7];
                $remissa->termo_id = $termo->id;
            }

            if(!empty($row[1])){
                $cdd = new Cdd;
                $cdd->cdd = $row[1];
                $cdd->save();

                # tabela pivot
                $cdd_termo = new CddTermo
                $cdd_termo->cdd_id = $cdd->id;
                $cdd_termo->termo_id = $termo->id;
                $cdd_termo->save();
            }
        }

        return 0;
    }
}
