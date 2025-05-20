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
        Schema::create('candidat_disponibilites', function (Blueprint $table) {
            $table->id();
             $table->foreignId('candidat_id')->constrained()->onDelete('cascade');
            $table->foreignId('disponibilite_id')->references('id')
            ->on('disponibilites')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidat_disponibilites');
    }
};
