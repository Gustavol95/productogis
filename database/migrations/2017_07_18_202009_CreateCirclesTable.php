<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circulos',function (Blueprint $table){
            $table->increments('id');
            $table->double('latitud');
            $table->double('longitud');
            $table->double('radio');
            $table->float('alpha')->nullable();
            $table->integer('hue')->nullable();
            $table->float('saturation')->nullable();
            $table->float('value')->nullable();
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
        Schema::dropIfExists('circulos');
    }
}
