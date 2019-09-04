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

    Schema::create('societes', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nom');
      $table->string('email');
      $table->string('logo');
      $table->string('siteweb');
      $table->rememberToken();
      $table->timestamps();
    });

    Schema::create('employes', function (Blueprint $table) {
      $table->increments('id');
      $table->string('prenom');
      $table->string('nom');
      $table->integer('tel');
      $table->string('email');
      $table->unsignedInteger('societe_id');
      $table->foreign('societe_id')->references('id')->on('societes')
        ->onDelete('cascade')
        ->onUpdate('cascade');
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
    Schema::dropIfExists('societes');
    Schema::dropIfExists('employes');
  }
}
