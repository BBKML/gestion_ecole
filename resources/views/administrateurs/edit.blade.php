@extends('layouts.app')

@section('content')
    <h1>Modifier l'administrateur</h1>

    <form method="POST" action="{{ route('administrateurs.update', ['administrateur' => $administrateur->IdAdministrateur]) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom:</label>
            <input type="text" name="Nom" id="nom" value="{{ $administrateur->Nom }}" required>
        </div>

        <div>
            <label for="prenom">Prénom:</label>
            <input type="text" name="Prenom" id="prenom" value="{{ $administrateur->Prenom }}" required>
        </div>

        <div>
            <label for="id_utilisateur">ID Utilisateur:</label>
            <input type="text" name="Id_Utilisateur" id="id_utilisateur" value="{{ $administrateur->Id_Utilisateur }}" required>
        </div>

        <!-- Ajoutez d'autres champs ici pour les autres attributs -->

        <div>
            <button type="submit">Enregistrer les modifications</button>
        </div>
    </form>

    <a href="{{ route('administrateurs.index') }}">Annuler</a>
    <a href="{{ route('administrateurs.index') }}">Retour à la liste des administrateurs</a>
@endsection
