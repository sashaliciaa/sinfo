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
        Schema::create('pertanians', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_tanaman')->nullable();
            $table->date('waktu_tanam')->nullable();
            $table->date('waktu_panen')->nullable();
            $table->string('luas_wilayah_tanam')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanians');
    }
};
