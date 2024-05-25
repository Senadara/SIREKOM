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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id('id');
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('namaMahasiswa', 100);
            $table->string('email', 100);
            $table->string('nim', 10);
            $table->string('jurusan', 100);
            $table->string('angkatan', 4);
            $table->string('noHP', 12);
            $table->string('fotoProfile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
