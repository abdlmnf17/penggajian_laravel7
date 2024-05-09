<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gaji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->bigIncrements('id_gaji'); 
            $table->string('kd_gaji');
            $table->string('tgl_gaji');
            $table->date('jam_mengajar');
            $table->string('id_tunjangan');
            $table->string('id_potongan');
            $table->string('id_guru');
            $table->string('gaji_pokok');
            $table->string('sub_total');
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
        Schema::dropIfExists('gajis');
    }
}
