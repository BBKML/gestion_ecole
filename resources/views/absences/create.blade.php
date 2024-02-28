@extends('layouts.app')

@section('content')
    <h1>Créer une absence</h1>

    <form action="{{ route('absences.store') }}" method="POST">
        @csrf

        <div>
            <label for="IdEtudiant">Nom de l'étudiant :</label>
            <!-- Afficher le nom de l'étudiant -->
            <select name="IdEtudiant" id="IdEtudiant">
                @foreach ($etudiants as $etudiant)
                    <option value="{{ $etudiant->IdEtudiant }}">{{ $etudiant->Nom }}</option>
                @endforeach
            </select>
            @error('IdEtudiant')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="IdCours">Nom du cours :</label>
            <!-- Afficher le nom du cours -->
            <select name="IdCours" id="IdCours">
                @foreach ($cours as $cour)
                    <option value="{{ $cour->IdCours }}">{{ $cour->NomCours }}</option>
                @endforeach
            </select>
            @error('IdCours')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="date_absence">Date d'absence :</label>
            <input type="date" name="date_absence" id="date_absence" value="{{ old('date_absence') }}">
            @error('date_absence')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="raison">Raison :</label><br>
            <textarea name="raison" id="raison" cols="30" rows="10">{{ old('raison') }}</textarea>
            @error('raison')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Enregistrer</button>
    </form>

    <a href="{{ route('absences.index') }}">Retour à la liste des absences</a>
@endsection
