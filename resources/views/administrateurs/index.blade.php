@extends('layouts.app')

@section('content')
    <h1>Liste des administrateurs</h1>

    <!-- Bouton Créer un nouvel administrateur -->
    <a href="{{ route('administrateurs.create') }}">Créer un nouvel administrateur</a>

    @if($administrateurs->isEmpty())
        <p>Aucun administrateur trouvé.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($administrateurs as $administrateur)
                    <tr>
                        <td>{{ $administrateur->Nom }}</td>
                        <td>{{ $administrateur->Prenom }}</td>
                        <td>{{ $administrateur->Date_Naissance }}</td>
                        <td>{{ $administrateur->E_mail }}</td>
                        <td>{{ $administrateur->Adresse }}</td>
                        <td>{{ $administrateur->Téléphone }}</td>
                        <td>
                            <!-- Bouton Modifier -->
                            <a href="{{ route('administrateurs.edit', ['administrateur' => $administrateur->IdAdministrateur]) }}">Modifier</a>
                            
                            <!-- Bouton Supprimer -->
                            <form method="POST" action="{{ route('administrateurs.destroy', ['administrateur' => $administrateur->IdAdministrateur]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                            
                            <!-- Bouton Détails (optionnel) -->
                            <a href="{{ route('administrateurs.show', ['administrateur' => $administrateur->IdAdministrateur]) }}">Détails</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
