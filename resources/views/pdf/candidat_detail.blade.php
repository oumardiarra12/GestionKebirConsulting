<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Profil du Candidat - {{ $candidat->nom_candidat }} {{ $candidat->prenom_candidat }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            color: #2c3e50;
            margin: 0;
            padding: 30px 40px;
            background-color: #fff;
        }

        h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #1b263b;
            border-bottom: 3px solid #2980b9;
            padding-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h4 {
            font-size: 18px;
            font-weight: 700;
            margin-top: 30px;
            margin-bottom: 12px;
            color: #2980b9;
            border-bottom: 2px solid #ddd;
            padding-bottom: 3px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px 12px;
            vertical-align: top;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2980b9;
            color: white;
            font-weight: 700;
            text-align: left;
        }

        td {
            background-color: #f9fbfc;
            color: #34495e;
        }

        .label {
            font-weight: 700;
            width: 25%;
            color: #34495e;
            background-color: transparent;
            border: none;
            padding-left: 0;
        }

        .section {
            margin-top: 25px;
            padding-bottom: 10px;
        }

        .badge {
            display: inline-block;
            background-color: #2980b9;
            color: white;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        img.photo {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #2980b9;
        }

        .photo-cell {
            text-align: right;
            vertical-align: top;
            width: 140px;
            padding-left: 10px;
        }

        a {
            color: #2980b9;
            text-decoration: none;
            word-break: break-all;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <h2>Profil du Candidat</h2>
            </td>
            <td class="photo-cell">
                @if($candidat->photo_candidat)
                    <img src="{{ public_path('storage/' . $candidat->photo_candidat) }}" class="photo" alt="Photo du candidat">
                @endif
            </td>
        </tr>
    </table>

    <div class="section">
        <h4>Informations personnelles</h4>
        <table>
            <tr>
                <td class="label">Nom :</td>
                <td>{{ $candidat->nom_candidat }}</td>
                <td class="label">Prénom :</td>
                <td>{{ $candidat->prenom_candidat }}</td>
            </tr>
            <tr>
                <td class="label">Date de naissance :</td>
                <td>{{ \Carbon\Carbon::parse($candidat->datenaissance_candidat)->format('d/m/Y') }}</td>
                <td class="label">Lieu :</td>
                <td>{{ $candidat->lieunaissance_candidat }}</td>
            </tr>
            <tr>
                <td class="label">Sexe :</td>
                <td>{{ $candidat->sexe_candidat }}</td>
                <td class="label">Nationalité :</td>
                <td>{{ $candidat->nationalite_candidat }}</td>
            </tr>
            <tr>
                <td class="label">Téléphone :</td>
                <td>{{ $candidat->tel_candidat }}</td>
                <td class="label">Email :</td>
                <td>{{ $candidat->email }}</td>
            </tr>
            <tr>
                <td class="label">Situation matrimoniale :</td>
                <td>{{ $candidat->situationmatrimoniale_candidat }}</td>
                <td class="label">Nombre d'enfants :</td>
                <td>{{ $candidat->nombreenfant_candidat }}</td>
            </tr>
            <tr>
                <td class="label">Adresse :</td>
                <td colspan="3">{{ $candidat->adresse_candidat }}</td>
            </tr>
            <tr>
                <td class="label">LinkedIn :</td>
                <td colspan="3">
                    @if($candidat->urllinkedln_candidat)
                        <a href="{{ $candidat->urllinkedln_candidat }}" target="_blank">{{ $candidat->urllinkedln_candidat }}</a>
                    @else
                        Non renseigné
                    @endif
                </td>
            </tr>
            @if($candidat->cv_candidat)
                <tr>
                    <td class="label">CV :</td>
                    <td colspan="3">
                        <a href="{{ public_path('storage/' . $candidat->cv_candidat) }}" target="_blank">Télécharger le CV</a>
                    </td>
                </tr>
            @endif
        </table>
    </div>

    <div class="section">
        <h4>Formations</h4>
        @if($candidat->formations->count())
            <table>
                <thead>
                    <tr>
                        <th>Diplôme</th>
                        <th>Établissement</th>
                        <th>Période</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidat->formations as $formation)
                        <tr>
                            <td>{{ $formation->diplome_formation }}</td>
                            <td>{{ $formation->etablissement_formation }}</td>
                            <td>{{ \Carbon\Carbon::parse($formation->date_debut_formation)->format('Y') }} -
                                {{ $formation->encours_formation ? 'En cours' : \Carbon\Carbon::parse($formation->date_fin_formation)->format('Y') }}
                            </td>
                            <td>{{ $formation->desciption_formation }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucune formation renseignée.</p>
        @endif
    </div>

    <div class="section">
        <h4>Expériences professionnelles</h4>
        @if($candidat->experiences->count())
            <table>
                <thead>
                    <tr>
                        <th>Poste</th>
                        <th>Entreprise</th>
                        <th>Période</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidat->experiences as $experience)
                        <tr>
                            <td>{{ $experience->poste_experience }}</td>
                            <td>{{ $experience->entreprise_experience }}</td>
                            <td>{{ \Carbon\Carbon::parse($experience->date_debut_experience)->format('Y') }} -
                                {{ $experience->encours_experience ? 'En cours' : \Carbon\Carbon::parse($experience->date_fin_experience)->format('Y') }}
                            </td>
                            <td>{{ $experience->description_poste }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucune expérience renseignée.</p>
        @endif
    </div>

    <div class="section">
        <h4>Compétences</h4>
        @if($candidat->competences->count())
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidat->competences as $competence)
                        <tr>
                            <td><span class="badge">{{ $competence->nom_competence }}</span></td>
                            <td>{{ $competence->description_competence }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucune compétence renseignée.</p>
        @endif
    </div>

    <div class="section">
        <h4>Langues</h4>
        @if($candidat->langues->count())
            <table>
                <thead>
                    <tr>
                        <th>Langue</th>
                        <th>Niveau</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidat->langues as $langue)
                        <tr>
                            <td>{{ $langue->nom_langue }}</td>
                            <td><span class="badge">{{ $langue->pivot->niveau }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucune langue renseignée.</p>
        @endif
    </div>
</body>
</html>
