<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $table = 'enseignant';

    protected $primaryKey = 'IdEnseignant';

    protected $fillable = [
        'Matricule',
        'Nom',
        'Prenom',
        'Id_Utilisateur',
        'Mot_de_passe',
        'Date_Naissance',
        'Lieu_Naissance',
        'E_mail',
        'Adresse',
        'Téléphone',
        'IdMatiere',
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'IdMatiere');
    }
}
