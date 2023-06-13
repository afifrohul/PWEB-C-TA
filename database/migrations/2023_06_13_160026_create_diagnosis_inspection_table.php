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
        Schema::create('diagnosis_inspection', function (Blueprint $table) {
            $table->unsignedBigInteger('diagnosis_id');
            $table->unsignedBigInteger('inspection_id');
            $table->primary(['diagnosis_id', 'inspection_id']);
            $table->foreign('diagnosis_id')->references('id')->on('diagnoses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('inspection_id')->references('id')->on('inspections')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosis_inspection');
    }
};
