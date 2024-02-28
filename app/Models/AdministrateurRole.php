<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrateurRole extends Model
{
    use HasFactory;

    protected $table = 'administrateurroles'; // Correction du nom de la table

    protected $primaryKey = 'IdAdministrateurrole';

    public function administrateur()
    {
        return $this->belongsTo(Administrateur::class, 'IdAdministrateur');
    }

    public function role()
    {
        return $this->belongsTo(RoleAdministrateur::class, 'IdRole');
    }
}
