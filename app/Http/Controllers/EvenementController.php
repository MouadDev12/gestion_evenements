<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Expert;
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

    // d) Afficher le formulaire de création
    public function create()
    {
        $experts = Expert::orderBy('nom')->get();
        return view('événements.create', compact('experts'));
    }

    // e) Enregistrer un nouvel événement
    public function store(Request $request)
    {
        $request->validate([
            'theme'           => 'required|string|max:255',
            'date_debut'      => 'required|date',
            'date_fin'        => 'required|date|after_or_equal:date_debut',
            'description'     => 'nullable|string',
            'cout_journalier' => 'required|numeric|min:0',
            'expert_id'       => 'required|exists:experts,id',
        ]);

        Evenement::create($request->only(['theme', 'date_debut', 'date_fin', 'description', 'cout_journalier', 'expert_id']));

        return redirect()->route('evenements.index')
            ->with('success', 'Événement ajouté avec succès.');
    }
}
