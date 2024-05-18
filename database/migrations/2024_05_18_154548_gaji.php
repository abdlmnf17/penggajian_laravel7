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
        Schema::create('gaji', function (Blueprint $table) {
            $table->id(); // id akan menjadi INT UNSIGNED secara otomatis
            $table->string('kd_gaji')->unique();
            $table->date('tgl_gaji');
            $table->integer('jam_mengajar');
            $table->foreignId('guru_id')->constrained('guru')->onDelete('cascade');
            $table->integer('gaji_pokok');
            $table->integer('sub_total');
            $table->timestamps();
        });

        // Buat tabel gaji_tunjangan
        Schema::create('gaji_tunjangan', function (Blueprint $table) {
            $table->foreignId('gaji_id')->constrained('gaji')->onDelete('cascade');
            $table->foreignId('tunjangan_id')->constrained()->onDelete('cascade');
            $table->primary(['gaji_id', 'tunjangan_id']);
        });

        // Buat tabel gaji_potongan
        Schema::create('gaji_potongan', function (Blueprint $table) {
            $table->foreignId('gaji_id')->constrained('gaji')->onDelete('cascade');
            $table->foreignId('potongan_id')->constrained()->onDelete('cascade');
            $table->primary(['gaji_id', 'potongan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gaji_potongan');
        Schema::dropIfExists('gaji_tunjangan');
        Schema::dropIfExists('gaji');
    }
}
