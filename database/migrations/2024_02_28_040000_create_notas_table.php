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
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('jenis_layanan_id');
            $table->string('nm_plggan');
            $table->string('waktu');
            $table->date('tanggal');
            $table->integer('total_hrg');
            $table->timestamps();

            $table->foreign('jenis_layanan_id')->references('id')->on('jenis_layanans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade')->onUpdate('cascade');
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
