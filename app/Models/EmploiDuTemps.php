<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    use HasFactory;

    protected $table = 'emploi_du_temps';

    // La table n'a pas de colonne ID distincte, alors nous n'avons pas besoin de spécifier de clé primaire ici.

    protected $fillable = [
        'id_cours',
        'id_enseignant',
        'id_salle',
        'id_classe',
        'jour_semaine',
        'heure_debut',
        'heure_fin',
    ];

    // Définition des relations avec les autres tables
    public function cours()
    {
        return $this->belongsTo(Cours::class, 'id_cours');
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant');
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'id_salle');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }
}
