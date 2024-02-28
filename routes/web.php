<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\AdministrateurRoleController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EmploiDuTempsController;
use App\Http\Controllers\FraisScolaireController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\RoleAdministrateurController;
use App\Http\Controllers\SalleController;

Route::get('/', function () {
    return view('welcome');
});

// Route pour afficher toutes les absences
Route::get('/absences', [AbsenceController::class, 'index'])->name('absences.index');

// Route pour afficher le formulaire de création d'une absence
Route::get('/absences/create', [AbsenceController::class, 'create'])->name('absences.create');

// Route pour enregistrer une nouvelle absence
Route::post('/absences', [AbsenceController::class, 'store'])->name('absences.store');

// Route pour afficher les détails d'une absence
Route::get('/absences/{absence}', [AbsenceController::class, 'show'])->name('absences.show');

// Route pour afficher le formulaire d'édition d'une absence
Route::get('/absences/{absence}/edit', [AbsenceController::class, 'edit'])->name('absences.edit');

// Route pour mettre à jour les informations d'une absence
Route::put('/absences/{absence}', [AbsenceController::class, 'update'])->name('absences.update');

// Route pour supprimer une absence
Route::delete('/absences/{absence}', [AbsenceController::class, 'destroy'])->name('absences.destroy');



// Routes pour les opérations CRUD des administrateurs
Route::get('/administrateur', [AdministrateurController::class, 'index'])->name('administrateurs.index');
Route::get('/administrateurs/create', [AdministrateurController::class, 'create'])->name('administrateurs.create');
Route::post('/administrateurs', [AdministrateurController::class, 'store'])->name('administrateurs.store');
Route::get('/administrateurs/{administrateur}', [AdministrateurController::class, 'show'])->name('administrateurs.show');
Route::get('/administrateurs/{administrateur}/edit', [AdministrateurController::class, 'edit'])->name('administrateurs.edit');
Route::put('/administrateurs/{administrateur}', [AdministrateurController::class, 'update'])->name('administrateurs.update');
Route::delete('/administrateurs/{administrateur}', [AdministrateurController::class, 'destroy'])->name('administrateurs.destroy');


// Routes pour les opérations CRUD des administrateurs rôle
Route::get('/administrateurrole', [AdministrateurRoleController::class, 'index'])->name('administrateurroles.index');
Route::get('/administrateurroles/create', [AdministrateurRoleController::class, 'create'])->name('administrateurroles.create');
Route::post('/administrateurroles', [AdministrateurRoleController::class, 'store'])->name('administrateurroles.store');
Route::get('/administrateurroles/{administrateurrole}', [AdministrateurRoleController::class, 'show'])->name('administrateurroles.show');
Route::get('/administrateurroles/{administrateurrole}/edit', [AdministrateurRoleController::class, 'edit'])->name('administrateurroles.edit');
Route::put('/administrateurroles/{administrateurrole}', [AdministrateurRoleController::class, 'update'])->name('administrateurroles.update');
Route::delete('/administrateurroles/{administrateurrole}', [AdministrateurRoleController::class, 'destroy'])->name('administrateurroles.destroy');

// Routes pour les opérations CRUD des bulletins
Route::get('/bulletins', [BulletinController::class, 'index'])->name('bulletins.index');
Route::get('/bulletins/create', [BulletinController::class, 'create'])->name('bulletins.create');
Route::post('/bulletins', [BulletinController::class, 'store'])->name('bulletins.store');
Route::get('/bulletins/{bulletin}', [BulletinController::class, 'show'])->name('bulletins.show');
Route::get('/bulletins/{bulletin}/edit', [BulletinController::class, 'edit'])->name('bulletins.edit');
Route::put('/bulletins/{bulletin}', [BulletinController::class, 'update'])->name('bulletins.update');
Route::delete('/bulletins/{bulletin}', [BulletinController::class, 'destroy'])->name('bulletins.destroy');

// Routes pour les opérations CRUD des étudiants
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('/etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');
Route::get('/etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');
Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');

// Routes pour les opérations CRUD des enseignants
Route::get('/enseignants', [EnseignantController::class, 'index'])->name('enseignants.index');
Route::get('/enseignants/create', [EnseignantController::class, 'create'])->name('enseignants.create');
Route::post('/enseignants', [EnseignantController::class, 'store'])->name('enseignants.store');
Route::get('/enseignants/{enseignant}', [EnseignantController::class, 'show'])->name('enseignants.show');
Route::get('/enseignants/{enseignant}/edit', [EnseignantController::class, 'edit'])->name('enseignants.edit');
Route::put('/enseignants/{enseignant}', [EnseignantController::class, 'update'])->name('enseignants.update');
Route::delete('/enseignants/{enseignant}', [EnseignantController::class, 'destroy'])->name('enseignants.destroy');

// Routes pour les opérations CRUD des parents
Route::get('/parents', [ParentController::class, 'index'])->name('parents.index');
Route::get('/parents/create', [ParentController::class, 'create'])->name('parents.create');
Route::post('/parents', [ParentController::class, 'store'])->name('parents.store');
Route::get('/parents/{parent}', [ParentController::class, 'show'])->name('parents.show');
Route::get('/parents/{parent}/edit', [ParentController::class, 'edit'])->name('parents.edit');
Route::put('/parents/{parent}', [ParentController::class, 'update'])->name('parents.update');
Route::delete('/parents/{parent}', [ParentController::class, 'destroy'])->name('parents.destroy');

// Routes pour les opérations CRUD des cours
Route::get('/cours', [CoursController::class, 'index'])->name('cours.index');
Route::get('/cours/create', [CoursController::class, 'create'])->name('cours.create');
Route::post('/cours', [CoursController::class, 'store'])->name('cours.store');
Route::get('/cours/{cour}', [CoursController::class, 'show'])->name('cours.show');
Route::get('/cours/{cour}/edit', [CoursController::class, 'edit'])->name('cours.edit');
Route::put('/cours/{cour}', [CoursController::class, 'update'])->name('cours.update');
Route::delete('/cours/{cour}', [CoursController::class, 'destroy'])->name('cours.destroy');

// Routes pour les opérations CRUD des emplois du temps
Route::get('/emploidutemps', [EmploiDuTempsController::class, 'index'])->name('emploidutemps.index');
Route::get('/emploidutemps/create', [EmploiDuTempsController::class, 'create'])->name('emploidutemps.create');
Route::post('/emploidutemps', [EmploiDuTempsController::class, 'store'])->name('emploidutemps.store');
Route::get('/emploidutemps/{emploiDuTemps}', [EmploiDuTempsController::class, 'show'])->name('emploidutemps.show');
Route::get('/emploidutemps/{emploiDuTemps}/edit', [EmploiDuTempsController::class, 'edit'])->name('emploidutemps.edit');
Route::put('/emploidutemps/{emploiDuTemps}', [EmploiDuTempsController::class, 'update'])->name('emploidutemps.update');
Route::delete('/emploidutemps/{emploiDuTemps}', [EmploiDuTempsController::class, 'destroy'])->name('emploidutemps.destroy');

// Routes pour les opérations CRUD des frais scolaires
Route::get('/fraisscolaire', [FraisScolaireController::class, 'index'])->name('fraisscolaire.index');
Route::get('/fraisscolaire/create', [FraisScolaireController::class, 'create'])->name('fraisscolaire.create');
Route::post('/fraisscolaire', [FraisScolaireController::class, 'store'])->name('fraisscolaire.store');
Route::get('/fraisscolaire/{fraisScolaire}', [FraisScolaireController::class, 'show'])->name('fraisscolaire.show');
Route::get('/fraisscolaire/{fraisScolaire}/edit', [FraisScolaireController::class, 'edit'])->name('fraisscolaire.edit');
Route::put('/fraisscolaire/{fraisScolaire}', [FraisScolaireController::class, 'update'])->name('fraisscolaire.update');
Route::delete('/fraisscolaire/{fraisScolaire}', [FraisScolaireController::class, 'destroy'])->name('fraisscolaire.destroy');

// Routes pour les opérations CRUD des matières
Route::get('/matiere', [MatiereController::class, 'index'])->name('matiere.index');
Route::get('/matiere/create', [MatiereController::class, 'create'])->name('matiere.create');
Route::post('/matiere', [MatiereController::class, 'store'])->name('matiere.store');
Route::get('/matiere/{matiere}', [MatiereController::class, 'show'])->name('matiere.show');
Route::get('/matiere/{matiere}/edit', [MatiereController::class, 'edit'])->name('matiere.edit');
Route::put('/matiere/{matiere}', [MatiereController::class, 'update'])->name('matiere.update');
Route::delete('/matiere/{matiere}', [MatiereController::class, 'destroy'])->name('matiere.destroy');

// Routes pour les opérations CRUD des résultats
Route::get('/resultat', [ResultatController::class, 'index'])->name('resultat.index');
Route::get('/resultat/create', [ResultatController::class, 'create'])->name('resultat.create');
Route::post('/resultat', [ResultatController::class, 'store'])->name('resultat.store');
Route::get('/resultat/{resultat}', [ResultatController::class, 'show'])->name('resultat.show');
Route::get('/resultat/{resultat}/edit', [ResultatController::class, 'edit'])->name('resultat.edit');
Route::put('/resultat/{resultat}', [ResultatController::class, 'update'])->name('resultat.update');
Route::delete('/resultat/{resultat}', [ResultatController::class, 'destroy'])->name('resultat.destroy');

// Routes pour les opérations CRUD des rôles administrateur
Route::get('/roleadministrateur', [RoleAdministrateurController::class, 'index'])->name('roleadministrateur.index');
Route::get('/roleadministrateur/create', [RoleAdministrateurController::class, 'create'])->name('roleadministrateur.create');
Route::post('/roleadministrateur', [RoleAdministrateurController::class, 'store'])->name('roleadministrateur.store');
Route::get('/roleadministrateur/{roleadministrateur}', [RoleAdministrateurController::class, 'show'])->name('roleadministrateur.show');
Route::get('/roleadministrateur/{roleadministrateur}/edit', [RoleAdministrateurController::class, 'edit'])->name('roleadministrateur.edit');
Route::put('/roleadministrateur/{roleadministrateur}', [RoleAdministrateurController::class, 'update'])->name('roleadministrateur.update');
Route::delete('/roleadministrateur/{roleadministrateur}', [RoleAdministrateurController::class, 'destroy'])->name('roleadministrateur.destroy');

// Routes pour les opérations CRUD des salles
Route::get('/salle', [SalleController::class, 'index'])->name('salle.index');
Route::get('/salle/create', [SalleController::class, 'create'])->name('salle.create');
Route::post('/salle', [SalleController::class, 'store'])->name('salle.store');
Route::get('/salle/{salle}', [SalleController::class, 'show'])->name('salle.show');
Route::get('/salle/{salle}/edit', [SalleController::class, 'edit'])->name('salle.edit');
Route::put('/salle/{salle}', [SalleController::class, 'update'])->name('salle.update');
Route::delete('/salle/{salle}', [SalleController::class, 'destroy'])->name('salle.destroy');
