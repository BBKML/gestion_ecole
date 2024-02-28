@extends('layouts.app')

@section('content')
    <h1>Éditer l'absence</h1>

    <form action="{{ route('absences.update', $absence->id_absence) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="id_etudiant">ID Étudiant :</label>
            <input type="text" name="id_etudiant" id="id_etudiant" value="{{ $absence->IdEtudiant }}">
        </div>

        <div>
            <label for="id_cours">ID Cours :</label>
            <input type="text" name="id_cours" id="id_cours" value="{{ $absence->IdCours }}">
        </div>

        <div>
            <label for="date_absence">Date d'absence :</label>
            <input type="date" name="date_absence" id="date_absence" value="{{ $absence->date_absence }}">
        </div>

        <div>
            <label for="raison">Raison :</label><br>
            <textarea name="raison" id="raison" cols="30" rows="10">{{ $absence->raison }}</textarea>
        </div>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <a href="{{ route('absences.index') }}">Retour à la liste des absences</a>
@endsection
