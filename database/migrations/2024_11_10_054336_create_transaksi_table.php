<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->integer('id_transaksi')->primary();;
            $table->date('tanggal_transaksi')->nullable();
            $table->string('nama_pelanggan', 15)->nullable();
            $table->string('total_harga', 25)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('transaksi');
    }
};
