<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Etudiant;
use App\Models\Historique;

use Illuminate\Support\Facades\DB;

class update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
       $Etudiant = Etudiant::get();

       foreach ($Etudiant as $Key => $value){
           Historique::create([
               'login'=>$value->login,
               'status'=>$value->status,
               'time'=>$value->time,
           ]);
       }
       DB::table('etudiants')->update(['status'=>'absent']);
       echo "success";
    }
}
