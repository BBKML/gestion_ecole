<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiant';

    protected $primaryKey = 'IdEtudiant';

    protected $fillable = [
        'Nom',
        'Prenom',
        'Id_Utilisateur',
        'Mot_de_passe',
        'Date_Naissance',
        'Lieu_Naissance',
        'E_mail',
        'Adresse',
        'Téléphone',
        'Matricule',
        'IdClasse',
        'IdParent',
        'Id_Emploi_du_temps',
        'Id_Bulletin',
    ];

    // Relation avec la classe
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'IdClasse');
    }

    // Relation avec le parent
    public function parent()
    {
        return $this->belongsTo(Parent::class, 'IdParent');
    }

    // Relation avec l'emploi du temps
    public function emploiDuTemps()
    {
        return $this->belongsTo(EmploiDuTemps::class, 'Id_Emploi_du_temps');
    }

    // Relation avec le bulletin
    public function bulletin()
    {
        return $this->belongsTo(Bulletin::class, 'Id_Bulletin');
    }
}
