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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('ref_code');
            $table->foreignId('customer_id')->references('id')->on('customer');
            $table->foreignId('jadwal_id')->nullable()->references('id')->on('jadwal');
            $table->integer('jumlah_kursi')->default(1);
            $table->integer('bisa_bayar')->default(0);
            $table->bigInteger('jumlah_bayar');
            $table->string('nomor_telepon');
            $table->string('lokasi_penjemputan');
            $table->string('lokasi_pengantaran');
            $table->string('bukti_bayar')->nullable();
            $table->time('waktu_mulai_bayar');
            $table->time('waktu_selesai_bayar');
            $table->enum('status', ['pending', 'butuh konfirmasi', 'lunas']);
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
        Schema::dropIfExists('pemesanan');
    }
};
