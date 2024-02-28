<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;

class CoursController extends Controller
{
    // Méthode pour afficher tous les cours
    public function index()
    {
        $cours = Cours::all();
        return view('cours.index', compact('cours'));
    }

    // Méthode pour afficher le formulaire de création d'un cours
    public function create()
    {
        return view('cours.create');
    }

    // Méthode pour enregistrer un nouveau cours
    public function store(Request $request)
    {
        $request->validate([
            'NomCours' => 'required|max:50',
            'IdEnseignant' => 'nullable|exists:enseignants,IdEnseignant',
            'IdClasse' => 'nullable|exists:classes,IdClasse',
        ]);

        Cours::create($request->all());

        return redirect()->route('cours.index')
            ->with('success', 'Cours créé avec succès.');
    }

    // Méthode pour afficher les détails d'un cours
    public function show($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.show', compact('cours'));
    }

    // Méthode pour afficher le formulaire d'édition d'un cours
    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.edit', compact('cours'));
    }

    // Méthode pour mettre à jour les informations d'un cours
    public function update(Request $request, $id)
    {
        $request->validate([
            'NomCours' => 'required|max:50',
            'IdEnseignant' => 'nullable|exists:enseignants,IdEnseignant',
            'IdClasse' => 'nullable|exists:classes,IdClasse',
        ]);

        $cours = Cours::findOrFail($id);
        $cours->update($request->all());

        return redirect()->route('cours.index')
            ->with('success', 'Informations du cours mises à jour avec succès.');
    }

    // Méthode pour supprimer un cours
    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();

        return redirect()->route('cours.index')
            ->with('success', 'Cours supprimé avec succès.');
    }
}
