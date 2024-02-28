<!-- resources/views/roles/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Liste des rôles administrateurs</h1>

    <!-- Bouton Créer un nouveau rôle administrateur -->
    <a href="{{ route('roleadministrateur.create') }}">Créer un nouveau rôle administrateur</a>

    @if($roles->isEmpty())
        <p>Aucun rôle administrateur trouvé.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nom du rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->Nom_Role }}</td>
                        <td>
                            <!-- Bouton Modifier -->
                            <a href="{{ route('roleadministrateur.edit', ['roleadministrateur' => $role->id]) }}">Modifier</a>
                            
                            <!-- Bouton Supprimer -->
                            <form method="POST" action="{{ route('roleadministrateur.destroy', ['roleadministrateur' => $role->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>
                            
                            <!-- Bouton Détails (optionnel) -->
                            <a href="{{ route('roleadministrateur.show', ['roleadministrateur' => $role->id]) }}">Détails</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
