<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_polisi');
            $table->string('jenis_mobil');
            $table->integer('kuota');
            $table->integer('sisa_kuota');
            $table->string('harga_travel');
            $table->string('harga_barang');
            $table->date('tanggal');
            $table->time('jam_berangkat');
            $table->foreignId('kota_keberangkatan_id')->references('id')->on('kota_keberangkatan');
            $table->foreignId('kota_tujuan_id')->references('id')->on('kota_tujuan');
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
        Schema::dropIfExists('jadwal');
    }
};
