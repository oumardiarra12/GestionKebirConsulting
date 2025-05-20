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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise');
            $table->string('logo_entreprise');
            $table->string('tel_entreprise');
            $table->string('addresse_entreprise');
            $table->string('forme_juridique_entreprise')->nullable();
            $table->text('description_entreprise')->nullable();
            $table->string('email_entreprise')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
