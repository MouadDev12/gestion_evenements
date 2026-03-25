@extends('layouts.app')

@section('title', 'Experts')
@section('page-title', 'Experts')

@section('content')

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fff4;">
            <i class="fa-solid fa-user-tie" style="color:#38a169;"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $experts->count() }}</div>
            <div class="stat-label">Experts enregistrés</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#ebf8ff;">
            <i class="fa-solid fa-calendar-days" style="color:#2b6cb0;"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $experts->sum('evenements_count') }}</div>
            <div class="stat-label">Événements couverts</div>
        </div>
    </div>
</div>

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.2rem; flex-wrap:wrap; gap:0.5rem;">
    <h1 style="font-size:1.15rem; font-weight:700; color:#1a365d;">
        <i class="fa-solid fa-user-tie" style="margin-right:0.4rem;"></i>
        Liste des experts
    </h1>
</div>

@if($experts->isEmpty())
    <div class="card" style="text-align:center; color:#718096; padding:3rem;">
        <i class="fa-solid fa-users-slash" style="font-size:2.5rem; margin-bottom:0.8rem; display:block;"></i>
        Aucun expert trouvé.
    </div>
@else
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:1rem;">
        @foreach($experts as $expert)
        <a href="{{ route('experts.show', $expert->id) }}" style="text-decoration:none;">
            <div class="card" style="margin-bottom:0; transition:transform 0.2s, box-shadow 0.2s; cursor:pointer;"
                 onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)'"
                 onmouseout="this.style.transform=''; this.style.boxShadow=''">
                <div style="display:flex; align-items:center; gap:1rem; margin-bottom:0.8rem;">
                    <div style="width:50px; height:50px; border-radius:50%; background:linear-gradient(135deg,#2b6cb0,#63b3ed);
                                display:flex; align-items:center; justify-content:center; color:#fff; font-size:1.1rem; font-weight:700; flex-shrink:0;">
                        {{ strtoupper(substr($expert->prenom,0,1)) }}{{ strtoupper(substr($expert->nom,0,1)) }}
                    </div>
                    <div>
                        <div style="font-weight:700; color:#1a365d; font-size:0.95rem;">
                            {{ $expert->prenom }} {{ $expert->nom }}
                        </div>
                        @if($expert->specialite)
                            <span class="badge badge-green" style="margin-top:3px;">{{ $expert->specialite }}</span>
                        @endif
                    </div>
                </div>
                <div style="font-size:0.82rem; color:#718096; display:flex; align-items:center; gap:0.4rem; margin-bottom:0.4rem;">
                    <i class="fa-regular fa-envelope"></i> {{ $expert->email }}
                </div>
                <div style="font-size:0.82rem; color:#718096; display:flex; align-items:center; gap:0.4rem;">
                    <i class="fa-solid fa-calendar-days" style="color:#63b3ed;"></i>
                    {{ $expert->evenements_count }} événement(s)
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endif

@endsection
