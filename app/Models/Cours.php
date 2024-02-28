<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $table = 'cours';

    protected $primaryKey = 'IdCours';

    protected $fillable = [
        'NomCours',
        'IdEnseignant',
        'IdClasse',
    ];

    // Relation avec l'enseignant
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'IdEnseignant');
    }

    // Relation avec la classe
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'IdClasse');
    }
}
