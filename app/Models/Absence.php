<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $table = 'absences';

    protected $primaryKey = 'id_absence';

    protected $fillable = [
        'IdEtudiant',
        'IdCours',
        'date_absence',
        'raison',
    ];

    // Définition des relations avec les autres tables
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'IdEtudiant');
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'IdCours');
    }
}
