<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creer une base de donnees MySQL base sur le fichier de configuration dans les parametres de systeme';

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
     * @return mixed
     */
    public function handle()
    {
        //Définition ce que commande va faire

        $schemaName = $this->argument('name')?: 
        config('database.connections.mysql.database');

        $charset = config('database.connections.mysql.charset','utf8mb4'); 
        $collation = config('database.connections.mysql.collation', 'utf8mb4_general_ci');
        //vider temporaimement
        config(['database.connections.mysql.database' => null]);

        $query = "DROP DATABASE $schemaName;";
        DB::statement($query);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset
        COLLATE $collation;";
        DB::statement($query);

        echo "Base de donnees $schemaName cree avec succes";
        config(['database.connections.mysql.database' => $schemaName]);
    }
}
