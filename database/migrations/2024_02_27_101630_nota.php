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
       Schema::create('nota', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota')->unique();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('jenis-layanan_id');
            $table->string('nm_plggan');
            $table->string('waktu');
            $table->date('tanggal');
            $table->integer('total_hrg');


            $table->foreign('jenis-layanan_id')->references('id')->on('jenis-layanan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
