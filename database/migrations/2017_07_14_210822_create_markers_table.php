<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcadores',function (Blueprint $table){
           $table->increments('id');
           $table->string('titulo');
           $table->string('snippet');
           $table->double('latitud');
           $table->double('longitud');
           $table->boolean('draggable');
           $table->boolean('flat');
           $table->integer('rotation');
           $table->float('z_index');
           $table->string('icon')->nullable();
           $table->tinyInteger('type');
           $table->timestamps();
           $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcadores');
    }
}
