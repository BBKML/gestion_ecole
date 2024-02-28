<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parent;

class ParentController extends Controller
{
    // Méthode pour afficher tous les parents
    public function index()
    {
        $parents = Parent::all();
        return view('parents.index', compact('parents'));
    }

    // Méthode pour afficher le formulaire de création d'un parent
    public function create()
    {
        return view('parents.create');
    }

    // Méthode pour enregistrer un nouveau parent
    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|max:50',
            'Prenom' => 'required|max:250',
            'Id_Utilisateur' => 'required|unique:parents,Id_Utilisateur',
            'Mot_de_passe' => 'required',
            'Date_Naissance' => 'nullable|date',
            'Lieu_Naissance' => 'nullable|max:50',
            'E_mail' => 'nullable|email|max:150',
            'Adresse' => 'nullable|max:150',
            'Téléphone' => 'nullable|max:50',
            'Id_Absence' => 'required|exists:absences,IdAbsence',
            'Id_Emploi_du_temps' => 'required|exists:emploi_du_temps,id',
            'IdResultat' => 'required|exists:resultat,IdResultat',
            'Id_Bulletin' => 'required|exists:bulletin,IdBulletin',
            'Id_FraisScolarite' => 'required|exists:frais_scolarite,IdFraisScolarite',
        ]);

        Parent::create($request->all());

        return redirect()->route('parents.index')
            ->with('success', 'Parent créé avec succès.');
    }

    // Méthode pour afficher les détails d'un parent
    public function show($id)
    {
        $parent = Parent::findOrFail($id);
        return view('parents.show', compact('parent'));
    }

    // Méthode pour afficher le formulaire d'édition d'un parent
    public function edit($id)
    {
        $parent = Parent::findOrFail($id);
        return view('parents.edit', compact('parent'));
    }

    // Méthode pour mettre à jour les informations d'un parent
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|max:50',
            'Prenom' => 'required|max:250',
            'Id_Utilisateur' => 'required|unique:parents,Id_Utilisateur,'.$id,
            'Mot_de_passe' => 'required',
            'Date_Naissance' => 'nullable|date',
            'Lieu_Naissance' => 'nullable|max:50',
            'E_mail' => 'nullable|email|max:150',
            'Adresse' => 'nullable|max:150',
            'Téléphone' => 'nullable|max:50',
            'Id_Absence' => 'required|exists:absences,IdAbsence',
            'Id_Emploi_du_temps' => 'required|exists:emploi_du_temps,id',
            'IdResultat' => 'required|exists:resultat,IdResultat',
            'Id_Bulletin' => 'required|exists:bulletin,IdBulletin',
            'Id_FraisScolarite' => 'required|exists:frais_scolarite,IdFraisScolarite',
        ]);

        $parent = Parent::findOrFail($id);
        $parent->update($request->all());

        return redirect()->route('parents.index')
            ->with('success', 'Informations du parent mises à jour avec succès.');
    }

    // Méthode pour supprimer un parent
    public function destroy($id)
    {
        $parent = Parent::findOrFail($id);
        $parent->delete();

        return redirect()->route('parents.index')
            ->with('success', 'Parent supprimé avec succès.');
    }
}
