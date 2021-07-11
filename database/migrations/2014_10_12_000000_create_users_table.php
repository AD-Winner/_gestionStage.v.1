<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique('email');
            $table->string('profil')->nullable();
           // $table->bigInteger('local')->nullable()->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            /*
            $table->bigInteger('secteur_id')->unsigned()->nullable();
            $table->bigInteger('cercle_id')->unsigned()->nullable();
            $table->bigInteger('region_id')->unsigned()->nullable();
            $table->rememberToken();
            */
            $table->timestamps();
           /* $table->foreign('secteur_id')->references('id')->on('secteurs');
            $table->foreign('cercle_id')->references('id')->on('cercles');
            $table->foreign('region_id')->references('id')->on('regions');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
