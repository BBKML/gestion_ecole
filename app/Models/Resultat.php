<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    protected $table = 'resultat';

    protected $primaryKey = 'IdResultat';

    protected $fillable = [
        'NoteTd',
        'NoteExamen',
        'IdEtudiant',
        'IdCours',
    ];

    // Relation avec l'étudiant
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'IdEtudiant');
    }

    // Relation avec le cours
    public function cours()
    {
        return $this->belongsTo(Cours::class, 'IdCours');
    }
}
