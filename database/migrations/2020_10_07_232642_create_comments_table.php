<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            //1 comentario pertenece a  1 usuario
            $table->bigInteger('user_id')->unsigned();
            $table->text('body');
            $table->timestamps();


            //Vamos a realizar relaciones polimorficas, es decir quiero que 1 comentario que pueda escribirse en 1 video y en un post:
            //todo lo que sea relacion molimorfia termina en able:
            //el metodo morphs: crea dos campos uno hace referencia al id y otra a la entidad
            $table->morphs('commentable');



            //si elimino el usuario se va a eliminar el Post:
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
        Schema::dropIfExists('comments');
    }
}
