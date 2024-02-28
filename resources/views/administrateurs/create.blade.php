@extends('layouts.app')

@section('content')
    <h1>Créer un administrateur</h1>

    <form method="POST" action="{{ route('administrateurs.store') }}">
        @csrf

        <div>
            <label for="nom">Nom:</label>
            <input type="text" name="Nom" id="nom" required>
        </div>

        <div>
            <label for="prenom">Prénom:</label>
            <input type="text" name="Prenom" id="prenom" required>
        </div>

        <div>
            <label for="id_utilisateur">ID Utilisateur:</label>
            <input type="text" name="Id_Utilisateur" id="id_utilisateur" required>
        </div>

        <div>
            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" name="Mot_de_passe" id="mot_de_passe" required>
        </div>

        <div>
            <label for="date_naissance">Date de naissance:</label>
            <input type="date" name="Date_Naissance" id="date_naissance" required>
        </div>

        <div>
            <label for="lieu_naissance">Lieu de naissance:</label>
            <input type="text" name="Lieu_Naissance" id="lieu_naissance" required>
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="E_mail" id="email" required>
        </div>

        <div>
            <label for="adresse">Adresse:</label>
            <input type="text" name="Adresse" id="adresse" required>
        </div>

        <div>
            <label for="telephone">Téléphone:</label>
            <input type="text" name="Téléphone" id="telephone" required>
        </div>

        <div>
            <button type="submit">Créer Administrateur</button>
        </div>
    </form>
@endsection
