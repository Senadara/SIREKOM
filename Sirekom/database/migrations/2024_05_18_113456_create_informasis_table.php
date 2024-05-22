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
        Schema::create('informasis', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idLomba');
            $table->string('namaInformasi', 50);
            $table->text('deskripsiInformasi');
            $table->date('deadlineInformasi');
            $table->string('lampiran');
            $table->timestamps();
            $table->foreign('idLomba')->references('id')->on('lombas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasis');
    }
};
