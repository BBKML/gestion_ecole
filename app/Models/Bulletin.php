<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    protected $table = 'bulletin';

    protected $primaryKey = 'id_bulletin';

    protected $fillable = [
        'id_etudiant',
        'id_cours',
        'IdResultat',
        'note_examen',
        'remarque',
    ];

    // Définition des relations avec les autres tables
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'id_etudiant');
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'id_cours');
    }

    public function resultat()
    {
        return $this->belongsTo(Resultat::class, 'IdResultat');
    }
}
