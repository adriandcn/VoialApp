<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
             Schema::create('tipo_reviews', function(Blueprint $table) {

            
            $table->increments('id')->unique();
            $table->integer('tipo_review');
            $table->string('tipo_estado');
            $table->string('descripcion');
            $table->timestamps();  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
                  Schema::drop('tipo_reviews');

    }
}
