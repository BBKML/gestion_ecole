<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;

class AbsenceController extends Controller
{
    // Méthode pour afficher toutes les absences
    public function index()
    {
        $absences = Absence::all();
        return view('absences.index', compact('absences'));
    }

    // Méthode pour afficher le formulaire de création d'une absence
    public function create()
    {
        $absence = new Absence();
        return view('absences.create', compact('absence'));
    }

    // Méthode pour enregistrer une nouvelle absence
    public function store(Request $request)
    {
        $request->validate([
            'IdEtudiant' => 'required|exists:etudiant,IdEtudiant',
            'IdCours' => 'required|exists:cours,IdCours',
            'date_absence' => 'required|date',
            'raison' => 'nullable|string|max:255',
        ]);

        Absence::create($request->all());

        return redirect()->route('absences.index')
            ->with('success', 'Absence enregistrée avec succès.');
    }

    // Méthode pour afficher les détails d'une absence
    public function show($id_absence)
    {
        $absence = Absence::findOrFail($id_absence);
        return view('absences.show', compact('absence'));
    }

    // Méthode pour afficher le formulaire d'édition d'une absence
    public function edit($id_absence)
    {
        $absence = Absence::findOrFail($id_absence);
        return view('absences.edit', compact('absence'));
    }

    // Méthode pour mettre à jour les informations d'une absence
    public function update(Request $request, $id_absence)
    {
        $request->validate([
            'id_etudiant' => 'required|exists:etudiant,IdEtudiant',
            'id_cours' => 'required|exists:cours,IdCours',
            'date_absence' => 'required|date',
            'raison' => 'nullable|string|max:255',
        ]);

        $absence = Absence::findOrFail($id_absence);
        $absence->update($request->all());

        return redirect()->route('absences.index')
            ->with('success', 'Informations de l\'absence mises à jour avec succès.');
    }

    // Méthode pour supprimer une absence
    public function destroy($id_absence)
    {
        $absence = Absence::findOrFail($id_absence);
        $absence->delete();

        return redirect()->route('absences.index')->with('success', 'Absence supprimée avec succès.');
    }
}
