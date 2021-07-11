<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('entreprise', 45)->nullable(false);
            $table->string('secteur_activite', 45)->nullable(false);
            $table->string('lieu', 45)->nullable(false);
            $table->string('theme', 255)->nullable(false);
            $table->string('tuteur_entreprise', 100)->nullable(true);
            $table->string('tuteur_entreprise_tel', 20)->nullable(true);;
            $table->string('tuteur_entreprise_email', 45);
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('fiche', 255)->nullable(false);

            $table->biginteger('voeux_ens1')->unsigned()->nullable(true);
            $table->biginteger('voeux_ens2')->unsigned()->nullable(true);
            $table->biginteger('voeux_ens3')->unsigned()->nullable(true);
            ##-- CLE ETRANGERE --##
            $table->biginteger('etudiant_id')->unsigned()->nullable(true);
            $table->biginteger('enseignant_id')->unsigned()->nullable(true);
              ##-- REFERENCES DES CLES ETRANGERES --##
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
            $table->foreign('enseignant_id')->references('id')->on('enseignants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
