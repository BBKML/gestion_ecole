<!-- resources/views/administrateur-roles/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Créer un nouvel administrateur-rôle</h1>

    <!-- Formulaire de création -->
    <form method="POST" action="{{ route('administrateurroles.store') }}">
        @csrf

        <!-- Champs du formulaire -->
        <div>
            <label for="IdAdministrateur">ID de l'administrateur:</label>
            <input type="text" name="IdAdministrateur" id="IdAdministrateur" required>
        </div>

        <div>
            <label for="IdRole">ID du rôle:</label>
            <input type="text" name="IdRole" id="IdRole" required>
        </div>

        <div>
            <button type="submit">Enregistrer</button>
        </div>
    </form>

    <a href="{{ route('administrateurroles.index') }}">Annuler</a>
@endsection
