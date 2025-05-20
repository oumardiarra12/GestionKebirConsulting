<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
              CandidatSeeder::class,
              ExperienceSeeder::class,
            SecteurSeeder::class,
            MetierSeeder::class,
            RenumerationSeeder::class,
            LangueSeeder::class,
            ExpertiseSeeder::class,
            DisponibiliteSeeder::class,
            RegionsTableSeeder::class,
            NiveauEtudeSeeder::class,
            MobiliteGeographiqueSeeder::class,
            NiveauGlobalExperienceSeeder::class,
            CandidatLangueSeeder::class,
            TypeContratSeeder::class,
            EntrepriseSeeder::class,
            PartenaireSeeder::class,
            FormationSeeder::class,
            CompetenceSeeder::class,
            AdminSeeder::class,
            CandidatCompetenceSeeder::class,
            CandidatDisponibiliteSeeder::class,
            CandidatExperienceSeeder::class,
            CandidatExperienceSeeder::class,
            CandidatExpertiseSeeder::class,
            CandidatMetierSeeder::class,
            CandidatNgeSeeder::class,
            CandidatNiveauEtudeSeeder::class,
            CandidatRegionSeeder::class,
            CandidatRenumerationSeeder::class,
            CandidatSecteurSeeder::class,
            CandidatTypeContratSeeder::class,
            EmploiSeeder::class,
             CandidatureSeeder::class,
        ]);
    }
}
