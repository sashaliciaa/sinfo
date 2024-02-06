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
        Schema::create('peternakans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_ternak')->nullable();
            $table->string('hewan_ternak')->nullable();
            $table->string('pakan')->nullable();
            $table->integer('umur_ternak')->nullable();
            $table->float('berat_ternak')->nullable();
            $table->integer('jumlah_ternak')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peternakans');
    }
};
