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
        // Schema::create('pesanans', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->foreignUuid('perusahaan_id')->constrained('perusahaans')->cascadeOnDelete();
        //     $table->foreignUuid('kasir_id')->constrained('kasirs')->cascadeOnDelete();
            
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
