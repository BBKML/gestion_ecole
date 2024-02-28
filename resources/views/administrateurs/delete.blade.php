@extends('layouts.app')

@section('content')
    <h1>Supprimer l'administrateur</h1>

    <p>Êtes-vous sûr de vouloir supprimer cet administrateur ? Cette action est irréversible.</p>

    <form method="POST" action="{{ route('administrateurs.destroy', $administrateur->id) }}">
        @csrf
        @method('DELETE')

        <button type="submit">Confirmer la suppression</button>
    </form>

    <a href="{{ route('administrateurs.index') }}">Annuler</a>
@endsection
