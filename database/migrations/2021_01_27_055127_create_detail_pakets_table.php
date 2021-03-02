<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDetailPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pakets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_paket');
            $table->foreign('id_paket')->references('id')->on('pakets')->onDelete('cascade');
            $table->string('tipe');
            $table->string('content');
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
        Schema::dropIfExists('detail_pakets');
    }
}