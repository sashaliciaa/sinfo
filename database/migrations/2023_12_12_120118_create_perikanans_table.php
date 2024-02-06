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
        Schema::create('perikanans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_ikan')->nullable();
            $table->string('pakan')->nullable();
            $table->string('jumlah_ikan')->nullable();
            $table->string('berat_ikan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perikanans');
    }
};
