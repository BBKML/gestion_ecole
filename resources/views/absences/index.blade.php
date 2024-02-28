@extends('layouts.app')

@section('content')
    <h1>Liste des absences</h1>

    <a href="{{ route('absences.create') }}">
        <button>Créer Nouvelle Absence</button>
    </a>

    <ul>
        @foreach ($absences as $absence)
            <li>{{ $absence->id_absence }} - {{ $absence->IdEtudiant }} - {{ $absence->IdCours }} - {{ $absence->date_absence }} - {{ $absence->raison }}
                <form action="{{ route('absences.edit', $absence->id_absence) }}" method="GET">
                    @csrf
                    <button type="submit">Éditer</button>
                </form>

                <form action="{{ route('absences.show', $absence->id_absence) }}" method="GET">
                    @csrf
                    <button type="submit">Détails</button>
                </form>

                <a href="#" onclick="confirmDelete('{{ $absence->id_absence }}')">Supprimer</a>

                <form id="delete-form-{{ $absence->id_absence }}" action="{{ route('absences.destroy', $absence->id_absence) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </li>
        @endforeach
    </ul>

    <script>
        function confirmDelete(absenceId) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cette absence ?")) {
                document.getElementById('delete-form-' + absenceId).submit();
            }
        }
    </script>
@endsection
