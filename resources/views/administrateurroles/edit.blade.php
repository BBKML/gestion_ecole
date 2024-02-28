<!-- resources/views/administrateur-roles/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier l'administrateur-rôle</h1>

    <!-- Formulaire de modification -->
    <form method="POST" action="{{ route('administrateur-roles.update', ['administrateur_role' => $administrateurrole->IdAdministrateurRole]) }}">
        @csrf
        @method('PUT')

        <!-- Champs du formulaire -->

        <div>
            <button type="submit">Enregistrer les modifications</button>
        </div>
    </form>

    <a href="{{ route('administrateur-roles.index') }}">Annuler</a>
@endsection
