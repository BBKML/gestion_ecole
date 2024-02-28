<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    // Méthode pour afficher tous les étudiants
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    // Méthode pour afficher le formulaire de création d'un étudiant
    public function create()
    {
        return view('etudiants.create');
    }

    // Méthode pour enregistrer un nouvel étudiant
    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|max:50',
            'Prenom' => 'required|max:250',
            'Id_Utilisateur' => 'required|unique:etudiants,Id_Utilisateur',
            'Mot_de_passe' => 'required',
            'Date_Naissance' => 'nullable|date',
            'Lieu_Naissance' => 'nullable|max:50',
            'E_mail' => 'nullable|email|max:150',
            'Adresse' => 'nullable|max:150',
            'Téléphone' => 'nullable|max:50',
            'Matricule' => 'nullable|max:15',
            'IdClasse' => 'nullable|exists:classes,IdClasse',
            'IdParent' => 'nullable|exists:parents,IdParent',
            'Id_Emploi_du_temps' => 'nullable|exists:emploi_du_temps,id_emploi_du_temps',
            'Id_Bulletin' => 'nullable|exists:bulletin,id_bulletin',
        ]);

        Etudiant::create($request->all());

        return redirect()->route('etudiants.index')
            ->with('success', 'Étudiant créé avec succès.');
    }

    // Méthode pour afficher les détails d'un étudiant
    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.show', compact('etudiant'));
    }

    // Méthode pour afficher le formulaire d'édition d'un étudiant
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.edit', compact('etudiant'));
    }

    // Méthode pour mettre à jour les informations d'un étudiant
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|max:50',
            'Prenom' => 'required|max:250',
            'Id_Utilisateur' => 'required|unique:etudiants,Id_Utilisateur,'.$id,
            'Mot_de_passe' => 'required',
            'Date_Naissance' => 'nullable|date',
            'Lieu_Naissance' => 'nullable|max:50',
            'E_mail' => 'nullable|email|max:150',
            'Adresse' => 'nullable|max:150',
            'Téléphone' => 'nullable|max:50',
            'Matricule' => 'nullable|max:15',
            'IdClasse' => 'nullable|exists:classes,IdClasse',
            'IdParent' => 'nullable|exists:parents,IdParent',
            'Id_Emploi_du_temps' => 'nullable|exists:emploi_du_temps,id_emploi_du_temps',
            'Id_Bulletin' => 'nullable|exists:bulletin,id_bulletin',
        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());

        return redirect()->route('etudiants.index')
            ->with('success', 'Informations de l\'étudiant mises à jour avec succès.');
    }

    // Méthode pour supprimer un étudiant
    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')
            ->with('success', 'Étudiant supprimé avec succès.');
    }
}
