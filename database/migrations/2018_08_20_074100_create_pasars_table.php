<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pasar');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->integer('kode_pos');
            $table->integer('telp');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('pasars');
    }
}
