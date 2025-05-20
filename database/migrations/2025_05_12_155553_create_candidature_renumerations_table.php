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
        Schema::create('candidature_renumerations', function (Blueprint $table) {
            $table->id();
              $table->foreignId('candidature_id')->constrained()->onDelete('cascade');
            $table->foreignId('renumeration_id')->references('id')
            ->on('renumerations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidature_renumerations');
    }
};
