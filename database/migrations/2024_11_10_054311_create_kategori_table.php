<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('kategori', function (Blueprint $table) {
            $table->string('kode_kategori', 5)->primary();
            $table->string('nama_kategori', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('kategori');
    }
};
