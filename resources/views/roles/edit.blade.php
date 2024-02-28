<!-- resources/views/roles/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier le rôle administrateur</h1>

    <!-- Formulaire de modification -->
    <form method="POST" action="{{ route('roleadministrateur.update', ['roleadministrateur' => $role->id]) }}">
        @csrf
        @method('PUT')

        <!-- Champs du formulaire -->
        <div>
            <label for="nom_role">Nom du rôle :</label>
            <input type="text" id="nom_role" name="Nom_Role" value="{{ $role->Nom_Role }}" required>
        </div>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <a href="{{ route('roleadministrateur.index') }}">Retour à la liste</a>
@endsection
