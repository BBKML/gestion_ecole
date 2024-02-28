@extends('layouts.app')

@section('content')
    <h1>Liste des administrateur-rôles</h1>

    <!-- Bouton Créer un nouvel administrateur-rôle -->
    <a href="{{ route('administrateurroles.create') }}">Créer un nouvel administrateur-rôle</a>

    @if($administrateurroles->isEmpty())
        <p>Aucun administrateur-rôle trouvé.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Administrateur</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($administrateurroles as $administrateurrole)
                    <tr>
                        <td>{{ $administrateurrole->administrateur->Nom }} {{ $administrateurrole->administrateur->Prenom }}</td>
                        <td>{{ $administrateurrole->role->Nom_Role }}</td>
                        <td>
                            <!-- Bouton Modifier -->
                            <a href="{{ route('administrateurroles.edit', ['administrateurrole' => $administrateurrole->IdAdministrateurRole]) }}">Modifier</a>
                            
                            <!-- Bouton Supprimer -->
                            <form method="POST" action="{{ route('administrateurroles.destroy', ['administrateurrole' => $administrateurrole->IdAdministrateurRole]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                            
                            <!-- Bouton Détails (optionnel) -->
                            <a href="{{ route('administrateurroles.show', ['administrateurrole' => $administrateurrole->IdAdministrateurRole]) }}">Détails</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
