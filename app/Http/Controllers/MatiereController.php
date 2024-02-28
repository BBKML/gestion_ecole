<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;

class MatiereController extends Controller
{
    // Méthode pour afficher toutes les matières
    public function index()
    {
        $matieres = Matiere::all();
        return view('matieres.index', compact('matieres'));
    }

    // Méthode pour afficher le formulaire de création d'une matière
    public function create()
    {
        return view('matieres.create');
    }

    // Méthode pour enregistrer une nouvelle matière
    public function store(Request $request)
    {
        $request->validate([
            'NomMatiere' => 'required|max:20',
        ]);

        Matiere::create($request->all());

        return redirect()->route('matieres.index')
            ->with('success', 'Matière créée avec succès.');
    }

    // Méthode pour afficher les détails d'une matière
    public function show($id)
    {
        $matiere = Matiere::findOrFail($id);
        return view('matieres.show', compact('matiere'));
    }

    // Méthode pour afficher le formulaire d'édition d'une matière
    public function edit($id)
    {
        $matiere = Matiere::findOrFail($id);
        return view('matieres.edit', compact('matiere'));
    }

    // Méthode pour mettre à jour les informations d'une matière
    public function update(Request $request, $id)
    {
        $request->validate([
            'NomMatiere' => 'required|max:20',
        ]);

        $matiere = Matiere::findOrFail($id);
        $matiere->update($request->all());

        return redirect()->route('matieres.index')
            ->with('success', 'Informations de la matière mises à jour avec succès.');
    }

    // Méthode pour supprimer une matière
    public function destroy($id)
    {
        $matiere = Matiere::findOrFail($id);
        $matiere->delete();

        return redirect()->route('matieres.index')
            ->with('success', 'Matière supprimée avec succès.');
    }
}
