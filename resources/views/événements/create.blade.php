@extends('layouts.app')

@section('title', 'Ajouter un événement')

@section('content')

<div style="margin-bottom:1rem;">
    <a href="{{ route('evenements.index') }}" class="btn btn-secondary">← Retour</a>
</div>

<div class="card" style="max-width:680px; margin:0 auto;">
    <h2 style="margin-bottom:1.5rem;">➕ Nouvel événement</h2>

    @if($errors->any())
        <div style="background:#fed7d7; color:#c53030; border:1px solid #fc8181; border-radius:6px; padding:0.75rem 1rem; margin-bottom:1.2rem; font-size:0.88rem;">
            <ul style="margin:0; padding-left:1.2rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('evenements.store') }}" method="POST">
        @csrf

        <div style="margin-bottom:1rem;">
            <label style="display:block; font-size:0.88rem; font-weight:600; margin-bottom:0.3rem; color:#4a5568;">Thème *</label>
            <input type="text" name="theme" value="{{ old('theme') }}"
                style="width:100%; padding:0.55rem 0.8rem; border:1px solid #cbd5e0; border-radius:5px; font-size:0.9rem; outline:none;"
                placeholder="Ex: Intelligence Artificielle">
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1rem;">
            <div>
                <label style="display:block; font-size:0.88rem; font-weight:600; margin-bottom:0.3rem; color:#4a5568;">Date début *</label>
                <input type="date" name="date_debut" value="{{ old('date_debut') }}"
                    style="width:100%; padding:0.55rem 0.8rem; border:1px solid #cbd5e0; border-radius:5px; font-size:0.9rem; outline:none;">
            </div>
            <div>
                <label style="display:block; font-size:0.88rem; font-weight:600; margin-bottom:0.3rem; color:#4a5568;">Date fin *</label>
                <input type="date" name="date_fin" value="{{ old('date_fin') }}"
                    style="width:100%; padding:0.55rem 0.8rem; border:1px solid #cbd5e0; border-radius:5px; font-size:0.9rem; outline:none;">
            </div>
        </div>

        <div style="margin-bottom:1rem;">
            <label style="display:block; font-size:0.88rem; font-weight:600; margin-bottom:0.3rem; color:#4a5568;">Description</label>
            <textarea name="description" rows="3"
                style="width:100%; padding:0.55rem 0.8rem; border:1px solid #cbd5e0; border-radius:5px; font-size:0.9rem; outline:none; resize:vertical;"
                placeholder="Description de l'événement...">{{ old('description') }}</textarea>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1rem;">
            <div>
                <label style="display:block; font-size:0.88rem; font-weight:600; margin-bottom:0.3rem; color:#4a5568;">Coût journalier (€) *</label>
                <input type="number" name="cout_journalier" value="{{ old('cout_journalier') }}" min="0" step="0.01"
                    style="width:100%; padding:0.55rem 0.8rem; border:1px solid #cbd5e0; border-radius:5px; font-size:0.9rem; outline:none;"
                    placeholder="Ex: 1200.00">
            </div>
            <div>
                <label style="display:block; font-size:0.88rem; font-weight:600; margin-bottom:0.3rem; color:#4a5568;">Expert *</label>
                <select name="expert_id"
                    style="width:100%; padding:0.55rem 0.8rem; border:1px solid #cbd5e0; border-radius:5px; font-size:0.9rem; outline:none; background:#fff;">
                    <option value="">-- Choisir un expert --</option>
                    @foreach($experts as $expert)
                        <option value="{{ $expert->id }}" {{ old('expert_id') == $expert->id ? 'selected' : '' }}>
                            {{ $expert->prenom }} {{ $expert->nom }}
                            @if($expert->specialite) — {{ $expert->specialite }} @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="display:flex; gap:0.8rem; margin-top:1.5rem;">
            <button type="submit" class="btn btn-primary" style="padding:0.6rem 1.5rem; font-size:0.95rem;">
                ✅ Enregistrer
            </button>
            <a href="{{ route('evenements.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

@endsection
