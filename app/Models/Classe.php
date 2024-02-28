<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classe';
    protected $primaryKey = 'IdClasse';
    protected $fillable = [
        'NomCours',
        'IdEnseignant',
        'IdClasse',
    ];
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'IdEnseignant');
    }
    
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'IdClasse');
    }        

    
}
