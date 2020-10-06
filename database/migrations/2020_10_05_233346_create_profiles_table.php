<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');

            //relación con la table Users 1 a 1:
            $table->bigInteger('user_id')->unsigned();
            $table->string('instagram')->nullable;
            $table->string('github')->nullable;
            $table->string('web')->nullable;

            $table->timestamps();

            //relación con la tabla de usuarios
            // si se elimna un usuario tambien se elimine su perfil, para eso es el método: onDetelete('cascade')
            //si hay una actualización también queremos que perjudique a la tabla de Profiles
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}