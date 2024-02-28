<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulletin;

class BulletinController extends Controller
{
    // Méthode pour afficher tous les bulletins
    public function index()
    {
        $bulletins = Bulletin::all();
        return view('bulletins.index', compact('bulletins'));
    }

    // Méthode pour afficher le formulaire de création d'un bulletin
    public function create()
    {
        return view('bulletins.create');
    }

    // Méthode pour enregistrer un nouveau bulletin
    public function store(Request $request)
    {
        $request->validate([
            'id_etudiant' => 'required|exists:etudiants,IdEtudiant',
            'id_cours' => 'required|exists:cours,IdCours',
            'IdResultat' => 'required|exists:resultats,IdResultat',
            'note_examen' => 'nullable|numeric',
            'remarque' => 'nullable|string',
        ]);

        Bulletin::create($request->all());

        return redirect()->route('bulletins.index')
            ->with('success', 'Bulletin créé avec succès.');
    }

    // Méthode pour afficher les détails d'un bulletin
    public function show($id)
    {
        $bulletin = Bulletin::findOrFail($id);
        return view('bulletins.show', compact('bulletin'));
    }

    // Méthode pour afficher le formulaire d'édition d'un bulletin
    public function edit($id)
    {
        $bulletin = Bulletin::findOrFail($id);
        return view('bulletins.edit', compact('bulletin'));
    }

    // Méthode pour mettre à jour les informations d'un bulletin
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_etudiant' => 'required|exists:etudiants,IdEtudiant',
            'id_cours' => 'required|exists:cours,IdCours',
            'IdResultat' => 'required|exists:resultats,IdResultat',
            'note_examen' => 'nullable|numeric',
            'remarque' => 'nullable|string',
        ]);

        $bulletin = Bulletin::findOrFail($id);
        $bulletin->update($request->all());

        return redirect()->route('bulletins.index')
            ->with('success', 'Informations du bulletin mises à jour avec succès.');
    }

    // Méthode pour supprimer un bulletin
    public function destroy($id)
    {
        $bulletin = Bulletin::findOrFail($id);
        $bulletin->delete();

        return redirect()->route('bulletins.index')
            ->with('success', 'Bulletin supprimé avec succès.');
    }
}
