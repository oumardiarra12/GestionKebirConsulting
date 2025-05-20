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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('poste_experience');
            $table->string('entreprise_experience');
            $table->date('date_debut_experience');
            $table->date('date_fin_experience')->nullable();
            $table->string('encours_experience')->nullable();
            $table->string('description_poste')->nullable();
            // $table->unsignedBigInteger('candidat_id');
            // $table->foreign('candidat_id')->references('id')->on('candidats')->onDelete('cascade');
    //         $table->unsignedBigInteger('reference_id')->nullable();
    // $table->foreign('reference_id')->references('id')->on('references')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
