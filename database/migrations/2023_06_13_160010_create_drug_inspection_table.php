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
        Schema::create('drug_inspection', function (Blueprint $table) {
            $table->unsignedBigInteger('drug_id');
            $table->unsignedBigInteger('inspection_id');
            $table->primary(['drug_id', 'inspection_id']);
            $table->foreign('drug_id')->references('id')->on('drugs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('inspection_id')->references('id')->on('inspections')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_inspection');
    }
};
