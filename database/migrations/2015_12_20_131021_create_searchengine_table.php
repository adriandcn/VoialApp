<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchengineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          
        Schema::create('searchengine', function(Blueprint $table) {

            
                        $table->increments('id')->unique();
            $table->integer ('id_usuario_servicio');
            $table->string('search');
            $table->boolean('estado_search');
            $table->string('tags');
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
               Schema::drop('searchengine');
    }
}
