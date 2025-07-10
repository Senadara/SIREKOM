<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idLomba');
            $table->unsignedBigInteger('idMahasiswa');
            $table->date('tanggalDaftar');
            $table->timestamps();
            // $table->primary(['idLomba', 'idMahasiswa']);
            $table->foreign('idLomba')->references('id')->on('lombas');
            $table->foreign('idMahasiswa')->references('id')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
