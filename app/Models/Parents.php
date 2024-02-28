<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
    use HasFactory;

    protected $table = 'parent';

    protected $primaryKey = 'IdParent';

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
        'Id_Absence',
        'Id_Emploi_du_temps',
        'IdResultat',
        'Id_Bulletin',
        'Id_FraisScolarite',
    ];

    // Relation avec les absences
    public function absence()
    {
        return $this->belongsTo(Absence::class, 'Id_Absence');
    }

    // Relation avec l'emploi du temps
    public function emploiDuTemps()
    {
        return $this->belongsTo(EmploiDuTemps::class, 'Id_Emploi_du_temps');
    }

    // Relation avec les résultats
    public function resultat()
    {
        return $this->belongsTo(Resultat::class, 'IdResultat');
    }

    // Relation avec le bulletin
    public function bulletin()
    {
        return $this->belongsTo(Bulletin::class, 'Id_Bulletin');
    }

    // Relation avec les frais de scolarité
    public function fraisScolarite()
    {
        return $this->belongsTo(FraisScolaire::class, 'Id_FraisScolarite');
    }
}
