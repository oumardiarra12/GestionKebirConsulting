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
        Schema::create('etape_candidatures', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut_etape');
            $table->date('date_fin_etape')->nullable();
            $table->foreignId('candidature_id')->constrained()->onDelete('cascade');
            $table->foreignId('etape_id')->constrained()->onDelete('cascade');
            $table->string('commentaire')->nullable();
            $table->enum('status_etape',["en attente", "validée", "échouée"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etape_candidatures');
    }
};
