<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable = ['theme', 'date_debut', 'date_fin', 'description', 'cout_journalier', 'expert_id'];

    // Un événement appartient à un expert (One To Many inverse)
    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }

    // Un événement a plusieurs ateliers (One To Many)
    public function ateliers()
    {
        return $this->hasMany(Atelier::class);
    }
}
