<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pemesanan');
            $table->foreign('id_pemesanan')->references('id')->on('pemesanans')->onDelete('cascade');
            $table->boolean('status')->nullable()->default(false);
            $table->LongText('img');
            $table->LongText('pelunasan');
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
        Schema::dropIfExists('pembayarans');
    }
}