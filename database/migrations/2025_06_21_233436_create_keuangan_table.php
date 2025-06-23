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
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id('id_keuangan');
            $table->unsignedBigInteger('id_eskul');
            $table->unsignedBigInteger('id_anggaran');
            $table->string('jenis_transaksi');
            $table->date('tanggal_terima');
            $table->double('jumlah_anggaran');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_eskul')->references('id_eskul')->on('ekstrakurikuler')->onDelete('cascade');
            $table->foreign('id_anggaran')->references('id_anggaran')->on('anggaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangan');
    }
};
