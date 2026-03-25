@extends('layouts.app')

@section('title', $evenement->theme)
@section('page-title', 'Détail événement')

@section('content')

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.2rem; flex-wrap:wrap; gap:0.5rem;">
    <a href="{{ route('evenements.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Retour
    </a>
    <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST"
          onsubmit="return confirm('Supprimer cet événement ?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fa-solid fa-trash"></i> Supprimer
        </button>
    </form>
</div>

{{-- Détails événement --}}
<div class="card">
    <h2><i class="fa-solid fa-calendar-days" style="margin-right:0.5rem; color:#3182ce;"></i>{{ $evenement->theme }}</h2>

    <table class="detail-table">
        <tr>
            <th><i class="fa-solid fa-tag" style="margin-right:0.4rem;"></i>Thème</th>
            <td>{{ $evenement->theme }}</td>
        </tr>
        <tr>
            <th><i class="fa-regular fa-calendar" style="margin-right:0.4rem;"></i>Date début</th>
            <td>{{ \Carbon\Carbon::parse($evenement->date_debut)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <th><i class="fa-regular fa-calendar-check" style="margin-right:0.4rem;"></i>Date fin</th>
            <td>{{ \Carbon\Carbon::parse($evenement->date_fin)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <th><i class="fa-solid fa-align-left" style="margin-right:0.4rem;"></i>Description</th>
            <td>{{ $evenement->description ?? '—' }}</td>
        </tr>
        <tr>
            <th><i class="fa-solid fa-coins" style="margin-right:0.4rem;"></i>Coût journalier</th>
            <td><span class="badge">{{ number_format($evenement->cout_journalier, 2) }} €</span></td>
        </tr>
        <tr>
            <th><i class="fa-solid fa-user-tie" style="margin-right:0.4rem;"></i>Expert</th>
            <td>
                @if($evenement->expert)
                    <strong>{{ $evenement->expert->prenom }} {{ $evenement->expert->nom }}</strong>
                    @if($evenement->expert->specialite)
                        <span class="badge badge-green" style="margin-left:0.5rem;">{{ $evenement->expert->specialite }}</span>
                    @endif
                    <div style="font-size:0.8rem; color:#718096; margin-top:3px;">
                        <i class="fa-regular fa-envelope"></i> {{ $evenement->expert->email }}
                    </div>
                @else
                    <em style="color:#a0aec0;">Non assigné</em>
                @endif
            </td>
        </tr>
    </table>
</div>

{{-- Ateliers --}}
<div class="card">
    <h3>
        <i class="fa-solid fa-chalkboard-user" style="margin-right:0.5rem; color:#3182ce;"></i>
        Ateliers
        <span class="badge" style="margin-left:0.5rem;">{{ $evenement->ateliers->count() }}</span>
    </h3>

    @if($evenement->ateliers->isEmpty())
        <p style="color:#718096; font-size:0.9rem; padding:1rem 0;">
            <i class="fa-regular fa-folder-open"></i> Aucun atelier pour cet événement.
        </p>
    @else
        <div class="table-wrapper" style="box-shadow:none; border:1px solid #e2e8f0; border-radius:8px;">
            <table style="min-width:400px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de l'atelier</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evenement->ateliers as $atelier)
                    <tr>
                        <td style="color:#a0aec0; font-size:0.8rem;">{{ $loop->iteration }}</td>
                        <td><strong>{{ $atelier->nom }}</strong></td>
                        <td style="color:#718096;">{{ $atelier->description ?? '—' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
