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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patien_id')->constrained('users');
            $table->foreignId('doctor_id')->constrained('users');
            $table->date('date_inspection');
            $table->foreignId('diagnosis_id')->constrined('diagnoses');
            $table->foreignId('drug_id')->constrined('drugs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
