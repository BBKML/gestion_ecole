<!-- resources/views/roles/delete.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Supprimer le rôle administrateur</h1>

    <p>Êtes-vous sûr de vouloir supprimer ce rôle administrateur ? Cette action est irréversible.</p>

    <!-- Formulaire de suppression -->
    <form method="POST" action="{{ route('roleadministrateur.destroy', ['roleadministrateur' => $role->id]) }}">
        @csrf
        @method('DELETE')

        <button type="submit">Confirmer la suppression</button>
    </form>

    <a href="{{ route('roleadministrateur.index') }}">Annuler</a>
@endsection
