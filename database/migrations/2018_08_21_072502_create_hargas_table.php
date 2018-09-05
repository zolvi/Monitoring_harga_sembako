<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_hargas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_komoditas')->unsigned();
            $table->integer('id_pasar')->unsigned();
            $table->date('tanggal');
            $table->integer('harga')->unsigned();
            $table->timestamps();

            $table->foreign('id_komoditas')->references('id')->on('komoditas');
            $table->foreign('id_pasar')->references('id')->on('pasars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hargas');
    }
}
