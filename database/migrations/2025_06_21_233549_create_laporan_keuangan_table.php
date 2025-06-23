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
        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->date('tanggal_laporan');
            $table->double('total_pemasukan');
            $table->double('total_pengeluaran');
            $table->double('saldo_akhir');
            $table->unsignedBigInteger('id_keuangan');
            $table->timestamps();

            $table->foreign('id_keuangan')->references('id_keuangan')->on('keuangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keuangan');
    }
};
