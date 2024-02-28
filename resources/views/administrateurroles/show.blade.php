<!-- resources/views/administrateur-roles/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Détails de l'administrateur-rôle</h1>

    <!-- Affichage des détails -->
    <p>Administrateur : {{ $administrateurrole->administrateur->Nom }} {{ $administrateurrole->administrateur->Prenom }}</p>
    <p>Rôle : {{ $administrateurrole->role->Nom_Role }}</p>

    <!-- Ajoutez d'autres détails ici -->

    <a href="{{ route('administrateur-roles.index') }}">Retour à la liste</a>
@endsection
