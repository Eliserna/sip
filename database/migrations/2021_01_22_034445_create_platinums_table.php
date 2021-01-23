<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatinumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platinums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_paket');
            $table->string('harga_paket');
            $table->string('perpanjangan');
            $table->string('domain');
            $table->string('penyimpanan');
            $table->string('bandwith');
            $table->string('desain');
            $table->string('fasilitas');
            $table->string('training');
            $table->string('webmail');
            $table->string('akses');
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
        Schema::dropIfExists('platinums');
    }
}
