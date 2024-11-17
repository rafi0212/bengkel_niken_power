<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('produk', function (Blueprint $table) {
            $table->string('no_produk', 15)->primary();
            $table->string('kode_kategori', 5);
            $table->string('nama_produk', 35)->nullable();
            $table->binary('gambar_produk');  
            $table->integer('stok')->nullable();
            $table->decimal('harga')->nullable();
            $table->timestamps();

            $table->foreign('kode_kategori')->references('kode_kategori')->on('kategori')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('produk');
    }
};
