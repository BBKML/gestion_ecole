@extends('layouts.app')

@section('content')
    <h1>Détails de l'absence</h1>

    <p><strong>ID :</strong> {{ $absence->id_absence }}</p> <!-- Utilisation de $absence->id pour l'identifiant de l'absence -->
    <p><strong>ID Étudiant :</strong> {{ $absence->IdEtudiant }}</p> <!-- Utilisation de $absence->id_etudiant -->
    <p><strong>ID Cours :</strong> {{ $absence->IdCours }}</p> <!-- Utilisation de $absence->id_cours -->
    <p><strong>Date d'absence :</strong> {{ $absence->date_absence }}</p>
    <p><strong>Raison :</strong> {{ $absence->raison }}</p>

    <a href="{{ route('absences.index') }}">Retour à la liste des absences</a>
@endsection
