<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleAdministrateur;

class RoleAdministrateurController extends Controller
{
    // Méthode pour afficher tous les rôles administrateurs
    public function index()
    {
        $roles = RoleAdministrateur::all();
        return view('roles.index', compact('roles'));
    }

    // Méthode pour afficher le formulaire de création d'un rôle administrateur
    public function create()
    {
        return view('roles.create');
    }

    // Méthode pour enregistrer un nouveau rôle administrateur
    public function store(Request $request)
    {
        $request->validate([
            'Nom_Role' => 'required|max:20',
        ]);

        RoleAdministrateur::create($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Rôle administrateur créé avec succès.');
    }

    // Méthode pour afficher les détails d'un rôle administrateur
    public function show($id)
    {
        $role = RoleAdministrateur::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    // Méthode pour afficher le formulaire d'édition d'un rôle administrateur
    public function edit($id)
    {
        $role = RoleAdministrateur::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    // Méthode pour mettre à jour les informations d'un rôle administrateur
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom_Role' => 'required|max:20',
        ]);

        $role = RoleAdministrateur::findOrFail($id);
        $role->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Informations du rôle administrateur mises à jour avec succès.');
    }

    // Méthode pour supprimer un rôle administrateur
    public function destroy($id)
    {
        $role = RoleAdministrateur::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rôle administrateur supprimé avec succès.');
    }
}
