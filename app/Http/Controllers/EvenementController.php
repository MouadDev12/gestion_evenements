<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    // a) Afficher la liste des événements
    public function index()
    {
        $evenements = Evenement::with('expert')->get();
        return view('événements.index', compact('evenements'));
    }

    // b) Afficher un événement donné
    public function show($id)
    {
        $evenement = Evenement::with(['expert', 'ateliers'])->findOrFail($id);
        return view('événements.show', compact('evenement'));
    }

    // c) Supprimer un événement et rediriger avec message de succès
    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->delete();

        return redirect()->route('evenements.index')
            ->with('success', 'Événement supprimé avec succès.');
    }
}
