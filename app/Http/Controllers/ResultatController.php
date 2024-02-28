<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resultat;

class ResultatController extends Controller
{
    // Méthode pour afficher tous les résultats
    public function index()
    {
        $resultats = Resultat::all();
        return view('resultats.index', compact('resultats'));
    }

    // Méthode pour afficher le formulaire de création d'un résultat
    public function create()
    {
        return view('resultats.create');
    }

    // Méthode pour enregistrer un nouveau résultat
    public function store(Request $request)
    {
        $request->validate([
            'NoteTd' => 'nullable|numeric',
            'NoteExamen' => 'nullable|numeric',
            'IdEtudiant' => 'nullable|exists:etudiants,IdEtudiant',
            'IdCours' => 'nullable|exists:cours,IdCours',
        ]);

        Resultat::create($request->all());

        return redirect()->route('resultats.index')
            ->with('success', 'Résultat créé avec succès.');
    }

    // Méthode pour afficher les détails d'un résultat
    public function show($id)
    {
        $resultat = Resultat::findOrFail($id);
        return view('resultats.show', compact('resultat'));
    }

    // Méthode pour afficher le formulaire d'édition d'un résultat
    public function edit($id)
    {
        $resultat = Resultat::findOrFail($id);
        return view('resultats.edit', compact('resultat'));
    }

    // Méthode pour mettre à jour les informations d'un résultat
    public function update(Request $request, $id)
    {
        $request->validate([
            'NoteTd' => 'nullable|numeric',
            'NoteExamen' => 'nullable|numeric',
            'IdEtudiant' => 'nullable|exists:etudiants,IdEtudiant',
            'IdCours' => 'nullable|exists:cours,IdCours',
        ]);

        $resultat = Resultat::findOrFail($id);
        $resultat->update($request->all());

        return redirect()->route('resultats.index')
            ->with('success', 'Informations du résultat mises à jour avec succès.');
    }

    // Méthode pour supprimer un résultat
    public function destroy($id)
    {
        $resultat = Resultat::findOrFail($id);
        $resultat->delete();

        return redirect()->route('resultats.index')
            ->with('success', 'Résultat supprimé avec succès.');
    }
}
