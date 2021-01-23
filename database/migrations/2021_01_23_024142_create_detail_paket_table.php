<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPaketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_paket', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_paket');
            $table->foreign('id_paket')->references('id')->on('pakets')->onDelete('cascade');
            $table->string('tipe');
            $table->string('domain');
            $table->string('penyimpanan');
            $table->string('bandwith');
            $table->string('desain');
            $table->string('fasilitas');
            $table->string('training');
            $table->string('webmail');
            $table->string('maintenance');
            $table->string('optimasi');
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
        Schema::dropIfExists('detail_paket');
    }
}
