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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idTask');
            $table->unsignedBigInteger('idPeserta');
            $table->string('lampiran');
            $table->timestamps();

            // $table->primary(['idSubmission']);
            $table->foreign('idTask')->references('id')->on('task');
            $table->foreign('idPeserta')->references('id')->on('pesertas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
