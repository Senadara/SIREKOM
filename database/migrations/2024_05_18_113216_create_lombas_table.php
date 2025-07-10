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
        Schema::create('lombas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idAdmin');
            $table->string('namaLomba', 50);
            $table->text('deskripsiLomba');
            $table->date('tanggalBukaPendaftaran');
            $table->date('tanggalTutupPendaftaran');
            $table->string('posterLomba');
            $table->string('lampiran');
            $table->timestamps();
            $table->foreign('idAdmin')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lombas');
    }
};
