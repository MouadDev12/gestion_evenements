@extends('layouts.app')

@section('title', 'Ateliers')
@section('page-title', 'Ateliers')

@section('content')

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background:#faf5ff;">
            <i class="fa-solid fa-chalkboard-user" style="color:#805ad5;"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $ateliers->count() }}</div>
            <div class="stat-label">Ateliers au total</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#ebf8ff;">
            <i class="fa-solid fa-calendar-days" style="color:#2b6cb0;"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $ateliers->pluck('evenement_id')->unique()->count() }}</div>
            <div class="stat-label">Événements concernés</div>
        </div>
    </div>
</div>

<div style="display:flex; align-items:center; margin-bottom:1.2rem;">
    <h1 style="font-size:1.15rem; font-weight:700; color:#1a365d;">
        <i class="fa-solid fa-chalkboard-user" style="margin-right:0.4rem;"></i>
        Liste des ateliers
    </h1>
</div>

@if($ateliers->isEmpty())
    <div class="card" style="text-align:center; color:#718096; padding:3rem;">
        <i class="fa-solid fa-chalkboard" style="font-size:2.5rem; margin-bottom:0.8rem; display:block;"></i>
        Aucun atelier trouvé.
    </div>
@else
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom de l'atelier</th>
                    <th>Description</th>
                    <th>Événement</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ateliers as $atelier)
                <tr class="clickable-row"
                    onclick="window.location='{{ route('evenements.show', $atelier->evenement_id) }}'">
                    <td style="color:#a0aec0; font-size:0.8rem;">{{ $atelier->id }}</td>
                    <td><strong style="color:#1a365d;">{{ $atelier->nom }}</strong></td>
                    <td style="color:#718096;">{{ $atelier->description ?? '—' }}</td>
                    <td>
                        @if($atelier->evenement)
                            <span style="display:flex; align-items:center; gap:0.4rem;">
                                <i class="fa-solid fa-calendar-days" style="color:#63b3ed; font-size:0.8rem;"></i>
                                {{ $atelier->evenement->theme }}
                            </span>
                        @else
                            <em style="color:#a0aec0;">—</em>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection
