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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom_candidat');
            $table->string('prenom_candidat');
            $table->date('datenaissance_candidat');
            $table->string('lieunaissance_candidat')->nullable();
            $table->enum('sexe_candidat',['M','F']);
            $table->string('nationalite_candidat')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('tel_candidat');
            $table->string('photo_candidat')->nullable();
            $table->string('cv_candidat')->nullable();
            $table->enum('situationmatrimoniale_candidat',['marie','celibataire'])->nullable();
            $table->string('adresse_candidat')->nullable();
            $table->integer('nombreenfant_candidat')->default(0);
            $table->string('password')->nullable();
             $table->string('urllinkedln_candidat')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
