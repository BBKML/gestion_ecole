<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;

class EnseignantController extends Controller
{
    // Méthode pour afficher tous les enseignants
    public function index()
    {
        $enseignants = Enseignant::all();
        return view('enseignants.index', compact('enseignants'));
    }

    // Méthode pour afficher le formulaire de création d'un enseignant
    public function create()
    {
        return view('enseignants.create');
    }

    // Méthode pour enregistrer un nouvel enseignant
    public function store(Request $request)
    {
        $request->validate([
            'Matricule' => 'nullable|max:15',
            'Nom' => 'required|max:50',
            'Prenom' => 'required|max:250',
            'Id_Utilisateur' => 'required|unique:enseignants,Id_Utilisateur',
            'Mot_de_passe' => 'required',
            'Date_Naissance' => 'nullable|date',
            'Lieu_Naissance' => 'nullable|max:50',
            'E_mail' => 'nullable|email|max:150',
            'Adresse' => 'nullable|max:150',
            'Téléphone' => 'nullable|max:50',
            'IdMatiere' => 'nullable|exists:matieres,IdMatiere',
        ]);

        Enseignant::create($request->all());

        return redirect()->route('enseignants.index')
            ->with('success', 'Enseignant créé avec succès.');
    }

    // Méthode pour afficher les détails d'un enseignant
    public function show($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        return view('enseignants.show', compact('enseignant'));
    }

    // Méthode pour afficher le formulaire d'édition d'un enseignant
    public function edit($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        return view('enseignants.edit', compact('enseignant'));
    }

    // Méthode pour mettre à jour les informations d'un enseignant
    public function update(Request $request, $id)
    {
        $request->validate([
            'Matricule' => 'nullable|max:15',
            'Nom' => 'required|max:50',
            'Prenom' => 'required|max:250',
            'Id_Utilisateur' => 'required|unique:enseignants,Id_Utilisateur,'.$id,
            'Mot_de_passe' => 'required',
            'Date_Naissance' => 'nullable|date',
            'Lieu_Naissance' => 'nullable|max:50',
            'E_mail' => 'nullable|email|max:150',
            'Adresse' => 'nullable|max:150',
            'Téléphone' => 'nullable|max:50',
            'IdMatiere' => 'nullable|exists:matieres,IdMatiere',
        ]);

        $enseignant = Enseignant::findOrFail($id);
        $enseignant->update($request->all());

        return redirect()->route('enseignants.index')
            ->with('success', 'Informations de l\'enseignant mises à jour avec succès.');
    }

    // Méthode pour supprimer un enseignant
    public function destroy($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->delete();

        return redirect()->route('enseignants.index')
            ->with('success', 'Enseignant supprimé avec succès.');
    }
}
