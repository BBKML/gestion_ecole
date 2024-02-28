<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdministrateurRole;

class AdministrateurRoleController extends Controller
{
    // Méthode pour afficher tous les administrateur-roles
    public function index()
    {
        $administrateurroles = Administrateurrole::all();
        return view('administrateurroles.index', compact('administrateurrole'));
    }

    // Méthode pour afficher le formulaire de création d'un administrateur-role
    public function create()
    {
        return view('administrateurroles.create');
    }

    // Méthode pour enregistrer un nouvel administrateur-role
    public function store(Request $request)
    {
        $request->validate([
            'IdAdministrateur' => 'required|exists:administrateurs,IdAdministrateur',
            'IdRole' => 'required|exists:roles,IdRole',
        ]);

        AdministrateurRole::create($request->all());

        return redirect()->route('administrateurroles.index')
            ->with('success', 'Administrateur-Role créé avec succès.');
    }

    // Méthode pour afficher les détails d'un administrateur-role
    public function show($id)
    {
        $administrateurRole = Administrateurrole::findOrFail($id);
        return view('administrateurroles.show', compact('administrateurorle'));
    }

    // Méthode pour afficher le formulaire d'édition d'un administrateur-role
    public function edit($id)
    {
        $administrateurRole = Administrateurrole::findOrFail($id);
        return view('administrateurroles.edit', compact('administrateurrole'));
    }

    // Méthode pour mettre à jour les informations d'un administrateur-role
    public function update(Request $request, $id)
    {
        $request->validate([
            'IdAdministrateur' => 'required|exists:administrateurs,IdAdministrateur',
            'IdRole' => 'required|exists:roles,IdRole',
        ]);

        $administrateurRole = Administrateurrole::findOrFail($id);
        $administrateurRole->update($request->all());

        return redirect()->route('administrateurroles.index')
            ->with('success', 'Informations de l\'administrateur-role mises à jour avec succès.');
    }

    // Méthode pour supprimer un administrateur-role
    public function destroy($id)
    {
        $administrateurRole = Administrateurrole::findOrFail($id);
        $administrateurRole->delete();

        return redirect()->route('administrateurroles.index')
            ->with('success', 'Administrateur-Role supprimé avec succès.');
    }
}
