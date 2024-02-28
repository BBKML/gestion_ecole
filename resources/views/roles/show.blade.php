<!-- resources/views/roles/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Détails du rôle administrateur</h1>

    <!-- Affichage des détails -->
    <p>Nom du rôle : {{ $role->Nom_Role }}</p>

    <a href="{{ route('roleadministrateur.index') }}">Retour à la liste</a>
@endsection
