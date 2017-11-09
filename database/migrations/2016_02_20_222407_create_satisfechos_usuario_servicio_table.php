<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSatisfechosUsuarioServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
            Schema::create('satisfechos_usuario_servicio', function(Blueprint $table) {

            
            $table->increments('id')->unique();
            $table->integer('id_usuario_servicio');
            $table->string('ip_turista');
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
        Schema::drop('satisfechos_usuario_servicio');
    }
}
