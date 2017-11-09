<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsUsuarioServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
             
        Schema::create('reviews_usuario_servicio', function(Blueprint $table) {

            
            $table->increments('id')->unique();
            $table->integer('id_usuario_servicio');
            $table->string('nombre_reviewer');
            $table->string('email_reviewer');
            $table->string('ip_reviewer');
            $table->string('text_review');
            $table->boolean('estado_review');
            $table->integer('calificacion');
            $table->double('peso');
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
        //
          Schema::drop('reviews_usuario_servicio');
    }
}
