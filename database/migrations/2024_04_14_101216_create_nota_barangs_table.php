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
        Schema::create('nota_barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nota_id');
            $table->string('barang');
            $table->float('harga');
            $table->integer('jumlah_barang');
            $table->float('total_harga');
            $table->timestamps();

            $table->foreign('nota_id')->references('id')->on('notas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_barangs');
    }
};
