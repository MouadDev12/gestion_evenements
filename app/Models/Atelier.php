<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    protected $fillable = ['nom', 'description', 'evenement_id'];

    // Un atelier appartient à un événement
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
