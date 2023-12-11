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
            $table->string('jenis_ternak');
            $table->string('hewan_ternak');
            $table->string('pakan');
            $table->integer('umur_ternak');
            $table->float('berat_ternak');
            $table->integer('jumlah_ternak');
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
