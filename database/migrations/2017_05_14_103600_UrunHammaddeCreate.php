<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UrunHammaddeCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('urunHammadde', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('urun_id')->unsigned();
          $table->foreign('urun_id')->references('id')->on('urunler')->onDelete('cascade');
          $table->integer('hammadde_id')->unsigned();
          $table->foreign('hammadde_id')->references('id')->on('hammadde')->onDelete('cascade');
          $table->string('miktar');
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
      Schema::dropIfExists('urunHammadde');
    }
}
