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
        Schema::create('pengumpulan_tugass', function (Blueprint $table) {
            $table->unsignedBigInteger('idInformasi');
            $table->unsignedBigInteger('idPeserta');
            $table->string('lampiran');
            $table->timestamps();

            $table->primary(['idInformasi', 'idPeserta']);
            $table->foreign('idInformasi')->references('idInformasi')->on('informasis');
            $table->foreign('idPeserta')->references('idPeserta')->on('pesertas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulan_tugass');
    }
};
