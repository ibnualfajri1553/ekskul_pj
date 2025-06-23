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
        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->id('id_eskul');
            $table->string('nama_eskul');
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->unsignedBigInteger('id_pembina')->nullable();
            $table->unsignedBigInteger('id_pelatih')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_pembina')->references('id')->on('pembina')->onDelete('set null');
            $table->foreign('id_pelatih')->references('id')->on('pelatih')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakulikuler');
    }
};
