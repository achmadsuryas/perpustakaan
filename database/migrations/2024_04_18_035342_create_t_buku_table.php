<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_bukus', function (Blueprint $table) {
            $table->id('f_id');
            $table->unsignedBigInteger('f_idkategori');
            $table->foreign('f_idkategori')->references('f_id')->on('t_kategoris')->cascadeOnDelete();
            $table->string('f_judul');
            $table->string('f_pengarang');
            $table->string('f_penerbit');
            $table->string('f_deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_bukus');
    }
};
