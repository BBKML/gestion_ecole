<!-- resources/views/roles/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Créer un nouveau rôle administrateur</h1>

    <!-- Formulaire de création -->
    <form method="POST" action="{{ route('roleadministrateur.store') }}">
        @csrf

        <!-- Champs du formulaire -->
        <div>
            <label for="nom_role">Nom du rôle :</label>
            <input type="text" id="nom_role" name="Nom_Role" required>
        </div>

        <button type="submit">Enregistrer</button>
    </form>

    <a href="{{ route('roleadministrateur.index') }}">Retour à la liste</a>
@endsection
