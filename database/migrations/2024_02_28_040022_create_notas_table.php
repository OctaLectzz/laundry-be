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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota')->unique();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('jenis_layanan_id');
            $table->string('waktu');
            $table->date('tanggal');
            $table->integer('berat');
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_layanan_id')->references('id')->on('jenis_layanans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
