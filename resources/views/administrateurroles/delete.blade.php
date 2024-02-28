<!-- resources/views/administrateur-roles/delete.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Supprimer l'administrateur-rôle</h1>

    <p>Êtes-vous sûr de vouloir supprimer cet administrateur-rôle ? Cette action est irréversible.</p>

    <!-- Formulaire de suppression -->
    <form method="POST" action="{{ route('administrateurroles.destroy', ['administrateur_role' => $administrateurrole->IdAdministrateurRole]) }}">
        @csrf
        @method('DELETE')

        <button type="submit">Confirmer la suppression</button>
    </form>

    <a href="{{ route('administrateurroles.index') }}">Annuler</a>
@endsection
