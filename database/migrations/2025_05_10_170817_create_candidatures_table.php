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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->date('date_candidature')->default(date('Y-m-d'));
            $table->foreignId('candidat_id')->constrained()->onDelete('cascade');
            $table->foreignId('emploi_id')->constrained()->onDelete('cascade');
            // $table->foreignId('etape_id')->constrained('etapes')->onDelete('cascade');
            $table->enum('status_candidature',['accepter','refuser','entend'])->default('entend');
            $table->enum('etape_candidature',['initiale','preselection1','preselection2','selection'])->default('initiale');
            $table->text('lettre_motivation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
