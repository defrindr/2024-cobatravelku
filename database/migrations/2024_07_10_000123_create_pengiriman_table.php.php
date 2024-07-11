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
        Schema::create('pengiriman', function (Blueprint $table) {

            $table->id();
            $table->string('ref_code');
            $table->foreignId('customer_id')->references('id')->on('customer');
            $table->foreignId('jadwal_id')->nullable()->references('id')->on('jadwal')->onDelete('cascade');
            $table->string('lokasi_penjemputan');
            $table->string('lokasi_pengantaran');
            $table->string('nomor_telepon');
            $table->bigInteger('jumlah_bayar');
            $table->string('bukti_bayar')->nullable();
            $table->enum('jenis_pembayaran', ['cash', 'tf']);
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
        Schema::dropIfExists('pengiriman');
    }
};
