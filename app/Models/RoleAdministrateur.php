<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAdministrateur extends Model
{
    use HasFactory;

    protected $table = 'roleadministrateur';

    protected $primaryKey = 'IdRole';

    protected $fillable = [
        'Nom_Role',
    ];
}
