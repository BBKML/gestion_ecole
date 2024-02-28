<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateur;

class AdministrateurController extends Controller
{
    // Méthode pour afficher tous les administrateurs
    public function index()
    {
        $administrateurs = Administrateur::all();
        return view('administrateurs.index', compact('administrateurs'));
    }

    // Méthode pour afficher le formulaire de création d'un administrateur
    public function create()
    {
        return view('administrateurs.create');
    }

    // Méthode pour enregistrer un nouvel administrateur
    public function store(Request $request)
    {
        // Validation des données reçues
        $request->validate([
            'Nom' => 'required',
            'Prenom' => 'required',
            'Id_Utilisateur' => 'required',
            'Mot_de_passe' => 'required',
            'Date_Naissance' => 'nullable|date',
            'Lieu_Naissance' => 'nullable',
            'E_mail' => 'nullable|email',
            'Adresse' => 'nullable',
            'Téléphone' => 'nullable',
        ]);

        // Création d'un nouvel administrateur
        Administrateur::create($request->all());

        // Redirection avec un message flash
        return redirect()->route('administrateurs.index')
            ->with('success', 'Administrateur créé avec succès.');
    }

    // Méthode pour afficher les détails d'un administrateur
public function show($IdAdministrateur)
{
    $administrateur = Administrateur::findOrFail($IdAdministrateur);
    return view('administrateurs.show', compact('administrateur'));
}

// Méthode pour afficher le formulaire d'édition d'un administrateur
public function edit($IdAdministrateur)
{
    $administrateur = Administrateur::findOrFail($IdAdministrateur);
    return view('administrateurs.edit', compact('administrateur'));
}

// Méthode pour mettre à jour les informations d'un administrateur
public function update(Request $request, $IdAdministrateur)
{
    // Validation des données reçues
    $request->validate([
        'Nom' => 'required',
        'Prenom' => 'required',
        'Id_Utilisateur' => 'required',
        'Mot_de_passe' => 'required',
        'Date_Naissance' => 'nullable|date',
        'Lieu_Naissance' => 'nullable',
        'E_mail' => 'nullable|email',
        'Adresse' => 'nullable',
        'Téléphone' => 'nullable',
    ]);

    // Mise à jour des informations de l'administrateur
    $administrateur = Administrateur::findOrFail($IdAdministrateur);
    $administrateur->update($request->all());

    // Redirection avec un message flash
    return redirect()->route('administrateurs.index')
        ->with('success', 'Informations de l\'administrateur mises à jour avec succès.');
}

// Méthode pour supprimer un administrateur
public function destroy($IdAdministrateur)
{
    $administrateur = Administrateur::findOrFail($IdAdministrateur);
    $administrateur->delete();

    // Redirection avec un message flash
    return redirect()->route('administrateurs.index')
        ->with('success', 'Administrateur supprimé avec succès.');
}
}
