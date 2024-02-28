<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;

class SalleController extends Controller
{
    // Méthode pour afficher toutes les salles
    public function index()
    {
        $salles = Salle::all();
        return view('salles.index', compact('salles'));
    }

    // Méthode pour afficher le formulaire de création d'une salle
    public function create()
    {
        return view('salles.create');
    }

    // Méthode pour enregistrer une nouvelle salle
    public function store(Request $request)
    {
        $request->validate([
            'NomSalle' => 'required|max:50',
        ]);

        Salle::create($request->all());

        return redirect()->route('salles.index')
            ->with('success', 'Salle créée avec succès.');
    }

    // Méthode pour afficher les détails d'une salle
    public function show($id)
    {
        $salle = Salle::findOrFail($id);
        return view('salles.show', compact('salle'));
    }

    // Méthode pour afficher le formulaire d'édition d'une salle
    public function edit($id)
    {
        $salle = Salle::findOrFail($id);
        return view('salles.edit', compact('salle'));
    }

    // Méthode pour mettre à jour les informations d'une salle
    public function update(Request $request, $id)
    {
        $request->validate([
            'NomSalle' => 'required|max:50',
        ]);

        $salle = Salle::findOrFail($id);
        $salle->update($request->all());

        return redirect()->route('salles.index')
            ->with('success', 'Informations de la salle mises à jour avec succès.');
    }

    // Méthode pour supprimer une salle
    public function destroy($id)
    {
        $salle = Salle::findOrFail($id);
        $salle->delete();

        return redirect()->route('salles.index')
            ->with('success', 'Salle supprimée avec succès.');
    }
}
