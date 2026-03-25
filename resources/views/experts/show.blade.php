@extends('layouts.app')

@section('title', $expert->prenom . ' ' . $expert->nom)
@section('page-title', 'Détail expert')

@section('content')

<div style="margin-bottom:1rem;">
    <a href="{{ route('experts.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Retour
    </a>
</div>

<div class="card">
    <div style="display:flex; align-items:center; gap:1.2rem; margin-bottom:1.2rem;">
        <div style="width:64px; height:64px; border-radius:50%; background:linear-gradient(135deg,#1a365d,#3182ce);
                    display:flex; align-items:center; justify-content:center; color:#fff; font-size:1.4rem; font-weight:700; flex-shrink:0;">
            {{ strtoupper(substr($expert->prenom,0,1)) }}{{ strtoupper(substr($expert->nom,0,1)) }}
        </div>
        <div>
            <h2 style="margin-bottom:0.3rem;">{{ $expert->prenom }} {{ $expert->nom }}</h2>
            @if($expert->specialite)
                <span class="badge badge-green">{{ $expert->specialite }}</span>
            @endif
        </div>
    </div>

    <table class="detail-table">
        <tr>
            <th><i class="fa-solid fa-user" style="margin-right:0.4rem;"></i>Nom complet</th>
            <td>{{ $expert->prenom }} {{ $expert->nom }}</td>
        </tr>
        <tr>
            <th><i class="fa-regular fa-envelope" style="margin-right:0.4rem;"></i>Email</th>
            <td>{{ $expert->email }}</td>
        </tr>
        <tr>
            <th><i class="fa-solid fa-star" style="margin-right:0.4rem;"></i>Spécialité</th>
            <td>{{ $expert->specialite ?? '—' }}</td>
        </tr>
    </table>
</div>

<div class="card">
    <h3>
        <i class="fa-solid fa-calendar-days" style="margin-right:0.5rem; color:#3182ce;"></i>
        Événements assignés
        <span class="badge" style="margin-left:0.5rem;">{{ $expert->evenements->count() }}</span>
    </h3>

    @if($expert->evenements->isEmpty())
        <p style="color:#718096; font-size:0.9rem; padding:1rem 0;">Aucun événement assigné.</p>
    @else
        <div class="table-wrapper" style="box-shadow:none; border:1px solid #e2e8f0; border-radius:8px;">
            <table style="min-width:400px;">
                <thead>
                    <tr>
                        <th>Thème</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Coût / jour</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expert->evenements as $ev)
                    <tr class="clickable-row" onclick="window.location='{{ route('evenements.show', $ev->id) }}'">
                        <td><strong>{{ $ev->theme }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($ev->date_debut)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($ev->date_fin)->format('d/m/Y') }}</td>
                        <td><span class="badge">{{ number_format($ev->cout_journalier, 2) }} €</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
