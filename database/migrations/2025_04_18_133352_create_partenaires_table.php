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
        Schema::create('partenaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom_partenaire');
            $table->string('email_partenaire')->nullable();
            $table->string('tel_partenaire')->nullable();
            $table->string('adresse_partenaire')->nullable();
            $table->string('logo_partenaire')->nullable();
            $table->string('siteweb_partenaire')->nullable();
            $table->enum('type_partenaire',['entreprise','institution','autres'])->default('autres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partenaires');
    }
};
