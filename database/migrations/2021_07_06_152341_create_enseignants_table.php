<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule', 45)->nullable(false);
            $table->string('prenom', 45)->nullable(false);
            $table->string('nom', 45)->nullable(false);
            $table->string('sexe', 10)->nullable(false);
            $table->string('code_postal', 45)->nullable(true);
            $table->string('email')->unique('email');
            $table->string('portable', 45)->nullable(true);
            $table->string('adresse', 45)->nullable(true);
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
        Schema::dropIfExists('enseignants');
    }
}
