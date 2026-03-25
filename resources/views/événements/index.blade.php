@extends('layouts.app')

@section('title', 'Liste des événements')
@section('page-title', 'Événements')

@section('content')

{{-- Stats --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background:#ebf8ff;">
            <i class="fa-solid fa-calendar-days" style="color:#2b6cb0;"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $evenements->count() }}</div>
            <div class="stat-label">Événements</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fff4;">
            <i class="fa-solid fa-user-tie" style="color:#38a169;"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $evenements->pluck('expert_id')->unique()->count() }}</div>
            <div class="stat-label">Experts impliqués</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fffaf0;">
            <i class="fa-solid fa-coins" style="color:#d69e2e;"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ number_format($evenements->sum('cout_journalier'), 0) }} €</div>
            <div class="stat-label">Coût total / jour</div>
        </div>
    </div>
</div>

{{-- Header --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.2rem; flex-wrap:wrap; gap:0.5rem;">
    <h1 style="font-size:1.15rem; font-weight:700; color:#1a365d;">
        <i class="fa-solid fa-table-list" style="margin-right:0.4rem;"></i>
        Liste des événements
    </h1>
    <a href="{{ route('evenements.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Ajouter un événement
    </a>
</div>

@if($evenements->isEmpty())
    <div class="card" style="text-align:center; color:#718096; padding:3rem;">
        <i class="fa-regular fa-calendar-xmark" style="font-size:2.5rem; margin-bottom:0.8rem; display:block;"></i>
        Aucun événement trouvé.
    </div>
@else
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Thème</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Coût / jour</th>
                    <th>Expert</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evenements as $evenement)
                <tr class="clickable-row"
                    onclick="window.location='{{ route('evenements.show', $evenement->id) }}'"
                    title="Voir les détails">
                    <td style="color:#a0aec0; font-size:0.8rem;">{{ $evenement->id }}</td>
                    <td>
                        <strong style="color:#1a365d;">{{ $evenement->theme }}</strong>
                    </td>
                    <td>
                        <span style="display:flex; align-items:center; gap:0.3rem;">
                            <i class="fa-regular fa-calendar" style="color:#63b3ed;"></i>
                            {{ \Carbon\Carbon::parse($evenement->date_debut)->format('d/m/Y') }}
                        </span>
                    </td>
                    <td>
                        <span style="display:flex; align-items:center; gap:0.3rem;">
                            <i class="fa-regular fa-calendar-check" style="color:#68d391;"></i>
                            {{ \Carbon\Carbon::parse($evenement->date_fin)->format('d/m/Y') }}
                        </span>
                    </td>
                    <td><span class="badge">{{ number_format($evenement->cout_journalier, 2) }} €</span></td>
                    <td>
                        @if($evenement->expert)
                            <span style="display:flex; align-items:center; gap:0.4rem;">
                                <i class="fa-solid fa-user-tie" style="color:#a0aec0; font-size:0.8rem;"></i>
                                {{ $evenement->expert->prenom }} {{ $evenement->expert->nom }}
                            </span>
                        @else
                            <em style="color:#a0aec0;">—</em>
                        @endif
                    </td>
                    <td class="actions" onclick="event.stopPropagation()">
                        <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-info">
                            <i class="fa-solid fa-eye"></i> Voir
                        </a>
                        <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Supprimer cet événement ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection
