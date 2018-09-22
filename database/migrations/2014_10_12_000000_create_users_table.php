<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('dirigeants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->rememberToken();
            $table->timestamps();
        });

         Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('contact');
            $table->string('mail');
             $table->date('datecreation');
             $table->unsignedInteger('dirigeant_id');
             $table->foreign('dirigeant_id')->references('id')->on('dirigeants')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

           Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->rememberToken();
            $table->timestamps();
        });

         Schema::create('rdvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('horaire');
             $table->unsignedInteger('client_id');
             $table->boolean('todaydate');
             $table->boolean('pastdate');
             $table->boolean('futuredate');
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
             $table->unsignedInteger('dirigeant_id');
             $table->foreign('dirigeant_id')->references('id')->on('dirigeants')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

         Schema::create('audiances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->date('dateaudiance');
            $table->date('daterenvoie');
            $table->string('resumeaudiiance');
            $table->unsignedInteger('categorie_id');
             $table->unsignedInteger('client_id');
              $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('restrict')
                ->onUpdate('restrict');
                 $table->foreign('categorie_id')->references('id')->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('rdvs');
        Schema::dropIfExists('dirigeants');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('audiances');
    }
}
