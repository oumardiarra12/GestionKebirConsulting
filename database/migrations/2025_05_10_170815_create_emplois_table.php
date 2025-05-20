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
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->string('titre_emplois');
            $table->TEXT('description_emplois');
            $table->date('date_debut_emplois');
            $table->date('date_fin_emplois');
            $table->enum('status_emploi',['Publier','Brouillon','Cloture']);
            $table->foreignId('type_contrat_id')->constrained()->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
             $table->foreignId('partenaire_id')->constrained()->onDelete('cascade');
            $table->foreignId('secteur_id')->constrained()->onDelete('cascade');
            $table->foreignId('niveau_etude_id')->constrained()->onDelete('cascade');
            $table->foreignId('niveau_global_experience_id')->constrained()->onDelete('cascade');
            $table->foreignId('metier_id')->constrained()->onDelete('cascade');
            $table->foreignId('renumeration_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois');
    }
};
