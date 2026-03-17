<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $fillable = ['nom', 'prenom', 'email', 'specialite'];

    // Un expert a plusieurs événements
    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
