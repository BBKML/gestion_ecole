@extends('layouts.app')

@section('content')
    <h1>Détails de l'administrateur</h1>

    <ul>
        <li><strong>Nom:</strong> {{ $administrateur->Nom }}</li>
        <li><strong>Prénom:</strong> {{ $administrateur->Prenom }}</li>
        <li><strong>ID Utilisateur:</strong> {{ $administrateur->Id_Utilisateur }}</li>
        <li><strong>Date de Naissance:</strong> {{ $administrateur->Date_Naissance }}</li>
        <li><strong>Lieu de Naissance:</strong> {{ $administrateur->Lieu_Naissance }}</li>
        <li><strong>Email:</strong> {{ $administrateur->E_mail }}</li>
        <li><strong>Adresse:</strong> {{ $administrateur->Adresse }}</li>
        <li><strong>Téléphone:</strong> {{ $administrateur->Téléphone }}</li>
    </ul>

    <a href="{{ route('administrateurs.index') }}">Retour à la liste des administrateurs</a>
@endsection
