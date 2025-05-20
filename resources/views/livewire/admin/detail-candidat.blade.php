@push('styles')
    <style>
  body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f7f9fc;
      color: #2c3e50;
      margin: 0;
      padding: 1rem;
  }
  .container {
      max-width: 900px;
      margin: auto;
      background: white;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      padding: 2rem;
  }
  .profile-wrapper {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
  }
  .left-col {
      flex: 2;
      min-width: 280px;
  }
  .right-col {
      flex: 1;
      min-width: 200px;
  }
  .profile-header {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      margin-bottom: 2rem;
  }
  .profile-photo {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border: 3px solid #1e3a8a;
  }
  .profile-name {
      font-size: 1.7rem;
      font-weight: 700;
      color: #1e3a8a;
      margin: 0 0 0.3rem;
  }
  .linkedin-link {
      font-size: 0.9rem;
      color: #0a66c2;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 0.3rem;
      overflow-wrap: break-word;
  }
  .linkedin-link:hover {
      text-decoration: underline;
  }
  h5, h6 {
      color: #1e3a8a;
      border-bottom: 2px solid #1e3a8a;
      padding-bottom: 0.3rem;
      margin-bottom: 1rem;
      font-weight: 600;
      user-select: none;
  }
  .card {
      background: #f9fafb;
      border-radius: 10px;
      padding: 1rem 1.2rem;
      margin-bottom: 1rem;
      box-shadow: 0 2px 6px rgba(30,58,138,0.1);
      border-left: 5px solid #1e3a8a;
      transition: transform 0.15s ease;
  }
  .card:hover {
      transform: translateX(4px);
      box-shadow: 0 6px 16px rgba(30,58,138,0.15);
  }
  .card.formation {
      border-left-color: #2f855a;
      background: #f0fdf4;
  }
  .card h6 {
      margin: 0 0 0.3rem;
      font-weight: 700;
      color: #1e3a8a;
  }
  .card p {
      margin: 0.15rem 0;
      font-size: 0.9rem;
      color: #4a5568;
  }
  .card small {
      color: #718096;
  }
  .info-list {
      list-style: none;
      padding: 0;
      margin: 0 0 1.5rem 0;
      font-size: 0.9rem;
      color: #4a5568;
  }
  .info-list li {
      margin-bottom: 0.6rem;
      display: flex;
      align-items: center;
      gap: 0.6rem;
  }
  .info-list li i {
      color: #a0aec0;
      font-size: 1.1rem;
      min-width: 18px;
      text-align: center;
  }
  .badge {
      font-size: 0.85rem;
      padding: 0.35em 0.75em;
      border-radius: 20px;
      display: inline-block;
      margin: 0 0.3rem 0.3rem 0;
      font-weight: 600;
  }
  .badge-primary {
      background-color: #1e3a8a;
      color: white;
  }
  .badge-secondary {
      background-color: #4a5568;
      color: white;
  }
  .btn-export {
      background: transparent;
      border: 2px solid #1e3a8a;
      color: #1e3a8a;
      padding: 0.5rem 1.1rem;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      margin-top: 2rem;
  }
  .btn-export:hover {
      background-color: #1e3a8a;
      color: white;
  }
  .cursor-pointer {
      cursor: pointer;
  }

  /* Responsive */
  @media (max-width: 900px) {
      .container {
          padding: 1rem 1.5rem;
      }
      .profile-wrapper {
          flex-direction: column;
          gap: 1.5rem;
      }
      .left-col, .right-col {
          flex: unset;
          min-width: unset;
          width: 100%;
      }
      .profile-header {
          flex-direction: column;
          align-items: center;
          text-align: center;
          gap: 1rem;
      }
      .linkedin-link {
          justify-content: center;
          word-break: break-word;
      }
      .profile-name {
          font-size: 1.5rem;
      }
      .btn-export {
          width: 100%;
          justify-content: center;
          font-size: 1rem;
          padding: 0.75rem;
          margin-top: 1.5rem;
      }
  }

  @media (max-width: 480px) {
      body {
          padding: 0.5rem;
      }
      .container {
          padding: 1rem;
          max-width: 100%;
          border-radius: 8px;
          box-shadow: none;
      }
      .profile-photo {
          width: 90px;
          height: 90px;
          border-width: 2px;
      }
      h5, h6 {
          font-size: 1.1rem;
      }
      .card {
          padding: 0.8rem 1rem;
      }
      .info-list {
          font-size: 0.85rem;
      }
      .badge {
          font-size: 0.75rem;
          padding: 0.3em 0.6em;
      }
      .btn-export {
          font-size: 0.9rem;
          padding: 0.6rem;
      }
  }
</style>
@endpush

<div class="container" x-data="{
    sections: {
        experiences: true,
        formations: true,
        competences: true,
        langues: true,
        infos: true,
        contact: true
    },
    toggle(section) {
        this.sections[section] = !this.sections[section];
    }
}">
  <div class="profile-wrapper">
    <!-- Colonne principale (gauche) -->
    <div class="left-col">
      <!-- En-tête profil -->
      <div class="profile-header">
        <img src="{{ asset('storage/' . $candidat->photo_candidat) }}" alt="Photo profil" class="profile-photo shadow-sm" />
        <div>
          <h4 class="profile-name">{{ $candidat->nom_candidat }} {{ $candidat->prenom_candidat }}</h4>
          @if($candidat->urllinkedln_candidat)
            <a href="{{ $candidat->urllinkedln_candidat }}" target="_blank" class="linkedin-link">
              <i class="bi bi-linkedin"></i> {{ $candidat->urllinkedln_candidat }}
            </a>
          @endif
        </div>
      </div>

      <!-- Expériences -->
      <h5
        class="cursor-pointer d-flex justify-content-between align-items-center"
        @click="toggle('experiences')"
      >
        Expériences professionnelles
        <i :class="sections.experiences ? 'bi bi-chevron-down' : 'bi bi-chevron-right'"></i>
      </h5>
      <div x-show="sections.experiences" x-transition>
        @forelse($candidat->experiences as $exp)
          <div class="card border-0">
            <h6>{{ $exp->poste_experience }}</h6>
            <p class="mb-1 text-muted">{{ $exp->entreprise_experience }}</p>
            <p>
              <small class="text-secondary">
                {{ $exp->date_debut_experience }} –
                {{ $exp->encours_experience ? 'Aujourd’hui' : $exp->date_fin_experience }}
              </small>
            </p>
            <p>{{ $exp->description_poste }}</p>
          </div>
        @empty
          <p class="text-muted fst-italic">Aucune expérience professionnelle enregistrée.</p>
        @endforelse
      </div>

      <!-- Formations -->
      <h5
        class="cursor-pointer d-flex justify-content-between align-items-center"
        @click="toggle('formations')"
      >
        Formations
        <i :class="sections.formations ? 'bi bi-chevron-down' : 'bi bi-chevron-right'"></i>
      </h5>
      <div x-show="sections.formations" x-transition>
        @forelse($candidat->formations as $formation)
          <div class="card formation border-0">
            <h6>{{ $formation->intitule_formation }}</h6>
            <p>{{ $formation->etablissement_formation }}</p>
            <p><small class="text-secondary">{{ $formation->date_debut_formation }} – {{ $formation->date_fin_formation }}</small></p>
          </div>
        @empty
          <p class="text-muted fst-italic">Aucune formation enregistrée.</p>
        @endforelse
      </div>

      <!-- Compétences -->
      <h5
        class="cursor-pointer d-flex justify-content-between align-items-center"
        @click="toggle('competences')"
      >
        Compétences
        <i :class="sections.competences ? 'bi bi-chevron-down' : 'bi bi-chevron-right'"></i>
      </h5>
      <div x-show="sections.competences" x-transition>
        @forelse($candidat->competences as $competence)
          <span class="badge badge-primary">{{ $competence->nom_competence }}</span>
        @empty
          <p class="text-muted fst-italic">Aucune compétence enregistrée.</p>
        @endforelse
      </div>

      <!-- Langues -->
      <h5
        class="cursor-pointer d-flex justify-content-between align-items-center"
        @click="toggle('langues')"
      >
        Langues
        <i :class="sections.langues ? 'bi bi-chevron-down' : 'bi bi-chevron-right'"></i>
      </h5>
      <div x-show="sections.langues" x-transition>
        @forelse($candidat->langues as $langue)
          <span class="badge badge-secondary">{{ $langue->nom_langue }}</span>
        @empty
          <p class="text-muted fst-italic">Aucune langue enregistrée.</p>
        @endforelse
      </div>
    </div>

    <!-- Colonne droite : infos personnelles et contact -->
    <div class="right-col">
      <h5
        class="cursor-pointer d-flex justify-content-between align-items-center"
        @click="toggle('infos')"
      >
        Informations personnelles
        <i :class="sections.infos ? 'bi bi-chevron-down' : 'bi bi-chevron-right'"></i>
      </h5>
      <ul class="info-list" x-show="sections.infos" x-transition>
        <li><i class="bi bi-calendar3"></i> Né(e) le : {{ $candidat->date_naissance_candidat }}</li>
        <li><i class="bi bi-geo-alt"></i> Adresse : {{ $candidat->adresse_candidat }}</li>
        <li><i class="bi bi-telephone"></i> Téléphone : {{ $candidat->telephone_candidat }}</li>
        <li><i class="bi bi-envelope"></i> Email : {{ $candidat->email_candidat }}</li>
      </ul>

      <h5
        class="cursor-pointer d-flex justify-content-between align-items-center"
        @click="toggle('contact')"
      >
        Contact
        <i :class="sections.contact ? 'bi bi-chevron-down' : 'bi bi-chevron-right'"></i>
      </h5>
      <ul class="info-list" x-show="sections.contact" x-transition>
        @if($candidat->linkedin_candidat)
          <li><i class="bi bi-linkedin"></i> <a href="{{ $candidat->linkedin_candidat }}" target="_blank" class="text-decoration-none">{{ $candidat->linkedin_candidat }}</a></li>
        @endif
        <!-- Ajouter d'autres contacts si besoin -->
      </ul>

      <!-- Bouton export PDF -->
      <button class="btn-export" wire:click="exportPdf()">
        <i class="bi bi-file-earmark-pdf"></i> Exporter en PDF
      </button>
    </div>
  </div>
</div>

