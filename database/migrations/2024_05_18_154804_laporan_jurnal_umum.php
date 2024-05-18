<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaporanJurnalUmum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_jurnal_umum', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gaji_id')->constrained('gaji')->onDelete('cascade');
            $table->foreignId('akun_debit_id')->constrained('akun')->onDelete('cascade');
            $table->foreignId('akun_kredit_id')->constrained('akun')->onDelete('cascade');
            $table->string('keterangan');
            $table->integer('jumlah_akun_debit');
            $table->integer('jumlah_akun_kredit');
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
        Schema::dropIfExists('laporan_jurnal_umum');
    }
}
