<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmploiDuTemps;

class EmploiDuTempsController extends Controller
{
    // Méthode pour afficher tous les emplois du temps
    public function index()
    {
        $emplois = EmploiDuTemps::all();
        return view('emplois.index', compact('emplois'));
    }

    // Méthode pour afficher le formulaire de création d'un emploi du temps
    public function create()
    {
        return view('emplois.create');
    }

    // Méthode pour enregistrer un nouvel emploi du temps
    public function store(Request $request)
    {
        $request->validate([
            'id_cours' => 'required|exists:cours,IdCours',
            'id_enseignant' => 'required|exists:enseignants,IdEnseignant',
            'id_salle' => 'required|exists:salles,IdSalle',
            'id_classe' => 'required|exists:classes,IdClasse',
            'jour_semaine' => 'required|max:20',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
        ]);

        EmploiDuTemps::create($request->all());

        return redirect()->route('emplois.index')
            ->with('success', 'Emploi du temps créé avec succès.');
    }

    // Méthode pour afficher les détails d'un emploi du temps
    public function show($id)
    {
        $emploi = EmploiDuTemps::findOrFail($id);
        return view('emplois.show', compact('emploi'));
    }

    // Méthode pour afficher le formulaire d'édition d'un emploi du temps
    public function edit($id)
    {
        $emploi = EmploiDuTemps::findOrFail($id);
        return view('emplois.edit', compact('emploi'));
    }

    // Méthode pour mettre à jour les informations d'un emploi du temps
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_cours' => 'required|exists:cours,IdCours',
            'id_enseignant' => 'required|exists:enseignants,IdEnseignant',
            'id_salle' => 'required|exists:salles,IdSalle',
            'id_classe' => 'required|exists:classes,IdClasse',
            'jour_semaine' => 'required|max:20',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
        ]);

        $emploi = EmploiDuTemps::findOrFail($id);
        $emploi->update($request->all());

        return redirect()->route('emplois.index')
            ->with('success', 'Informations de l\'emploi du temps mises à jour avec succès.');
    }

    // Méthode pour supprimer un emploi du temps
    public function destroy($id)
    {
        $emploi = EmploiDuTemps::findOrFail($id);
        $emploi->delete();

        return redirect()->route('emplois.index')
            ->with('success', 'Emploi du temps supprimé avec succès.');
    }
}
