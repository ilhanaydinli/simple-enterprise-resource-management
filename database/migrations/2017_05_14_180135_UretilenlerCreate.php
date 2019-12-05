<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UretilenlerCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('uretilenler', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->integer('urun_id')->unsigned();
           $table->foreign('urun_id')->references('id')->on('urunler')->onDelete('cascade');
           $table->string('uretimMiktari');
           $table->string('hammaddeUcreti');
           $table->string('ekUcretler');
           $table->string('toplamUcret');
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
       Schema::dropIfExists('uretilenler');
     }
}
