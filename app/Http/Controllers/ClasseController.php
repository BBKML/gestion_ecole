<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    // Méthode pour afficher toutes les classes
    public function index()
    {
        $classes = Classe::all();
        return view('classes.index', compact('classes'));
    }

    // Méthode pour afficher le formulaire de création d'une classe
    public function create()
    {
        return view('classes.create');
    }

    // Méthode pour enregistrer une nouvelle classe
    public function store(Request $request)
    {
        $request->validate([
            'NomClasse' => 'required|max:50',
        ]);

        Classe::create($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Classe créée avec succès.');
    }

    // Méthode pour afficher les détails d'une classe
    public function show($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.show', compact('classe'));
    }

    // Méthode pour afficher le formulaire d'édition d'une classe
    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.edit', compact('classe'));
    }

    // Méthode pour mettre à jour les informations d'une classe
    public function update(Request $request, $id)
    {
        $request->validate([
            'NomClasse' => 'required|max:50',
        ]);

        $classe = Classe::findOrFail($id);
        $classe->update($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Informations de la classe mises à jour avec succès.');
    }

    // Méthode pour supprimer une classe
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        $classe->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Classe supprimée avec succès.');
    }
}
