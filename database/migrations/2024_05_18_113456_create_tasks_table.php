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
        Schema::create('task', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idLomba');
            $table->string('namaTask', 100);
            $table->enum('tipe', [1, 2]);
            $table->text('deskripsiTask');
            $table->date('deadlineTask')->nullable();
            $table->string('lampiran')->nullable();
            $table->timestamps();
            $table->foreign('idLomba')->references('id')->on('lombas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
