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
        Schema::create('detaillombas', function (Blueprint $table) {
            $table->unsignedBigInteger('idLomba');
            $table->unsignedBigInteger('idPeserta');
            $table->date('tanggalDaftar');
            $table->timestamps();
            $table->primary(['idLomba', 'idPeserta']);
            $table->foreign('idLomba')->references('id')->on('lombas');
            $table->foreign('idPeserta')->references('id')->on('pesertas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detaillombas');
    }
};
