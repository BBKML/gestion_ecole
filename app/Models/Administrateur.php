<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;

    protected $table = 'administrateur'; // Spécifie le nom de la table associée

    protected $fillable = [ // Définit les attributs modifiables
        'Nom',
        'Prenom',
        'Id_Utilisateur',
        'Mot_de_passe',
        'Date_Naissance',
        'Lieu_Naissance',
        'E_mail',
        'Adresse',
        'Téléphone',
    ];

    protected $primaryKey = 'IdAdministrateur'; // Spécifie la clé primaire
}
