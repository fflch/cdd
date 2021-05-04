<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Termo;
use App\Models\Remissiva;

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
            $termo->save();

            if(!empty($row[7])){
                $remissa = new Remissiva;
                $remissa->titulo = $row[7];
                $remissa->termo_id = $termo->id;
            }
        }

        return 0;
    }
}
