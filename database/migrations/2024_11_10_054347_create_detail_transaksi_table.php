<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->integer('id_transaksi');
            $table->string('no_produk', 15);
            $table->string('nama_produk', 35)->nullable();
            $table->integer('qty')->nullable();
            $table->string('harga', 35)->nullable();
            $table->string('sub_total', 25)->nullable();
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade');
            $table->foreign('no_produk')->references('no_produk')->on('produk')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('detail_transaksi');
    }
};
