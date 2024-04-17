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
            $table->enum('jenis', ['Barang Satuan', 'Paket Kiloan']);
            $table->string('nama_pelanggan');
            $table->unsignedBigInteger('jenis_layanan_id')->nullable();
            $table->unsignedBigInteger('kiloan_id')->nullable();
            $table->integer('berat')->nullable();
            $table->dateTime('waktu');
            $table->float('jumlah');
            $table->integer('diskon');
            $table->float('total_harga');
            $table->timestamps();

            $table->foreign('jenis_layanan_id')->references('id')->on('jenis_layanans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kiloan_id')->references('id')->on('kiloans')->onDelete('cascade')->onUpdate('cascade');
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
