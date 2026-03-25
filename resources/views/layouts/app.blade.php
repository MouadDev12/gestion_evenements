<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Événements')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f4f8;
            color: #2d3748;
            min-height: 100vh;
            display: flex;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: linear-gradient(180deg, #1a365d 0%, #2b6cb0 100%);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
            transition: width 0.3s;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.4rem 1.2rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-decoration: none;
        }

        .sidebar-brand .brand-icon {
            width: 38px; height: 38px;
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; color: #fff;
            flex-shrink: 0;
        }

        .sidebar-brand .brand-text {
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .sidebar-brand .brand-text span {
            display: block;
            font-size: 0.72rem;
            font-weight: 400;
            color: #bee3f8;
            margin-top: 1px;
        }

        .sidebar-menu {
            padding: 1rem 0;
            flex: 1;
        }

        .menu-label {
            font-size: 0.68rem;
            font-weight: 700;
            color: #90cdf4;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.8rem 1.2rem 0.4rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            padding: 0.72rem 1.2rem;
            color: #bee3f8;
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.2s;
            cursor: pointer;
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
            border-left-color: #63b3ed;
        }

        .nav-item.active {
            background: rgba(255,255,255,0.15);
            color: #fff;
            border-left-color: #fff;
        }

        .nav-item .nav-icon {
            width: 32px; height: 32px;
            background: rgba(255,255,255,0.1);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.9rem;
            flex-shrink: 0;
            transition: background 0.2s;
        }

        .nav-item:hover .nav-icon,
        .nav-item.active .nav-icon {
            background: rgba(255,255,255,0.2);
        }

        .nav-badge {
            margin-left: auto;
            background: #63b3ed;
            color: #1a365d;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.15rem 0.5rem;
            border-radius: 20px;
        }

        .sidebar-footer {
            padding: 1rem 1.2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.78rem;
            color: #90cdf4;
            text-align: center;
        }

        /* ── TOPBAR ── */
        .topbar {
            position: fixed;
            top: 0; left: 240px; right: 0;
            height: 64px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            z-index: 99;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        }

        .topbar-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: #2d3748;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .topbar-right .avatar {
            width: 36px; height: 36px;
            background: #2b6cb0;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 0.85rem;
            font-weight: 700;
        }

        /* ── MAIN CONTENT ── */
        .main-wrapper {
            margin-left: 240px;
            padding-top: 64px;
            flex: 1;
            min-height: 100vh;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 1.8rem 1.5rem;
        }

        /* ── ALERTS ── */
        .alert-success {
            background: #c6f6d5;
            color: #276749;
            border: 1px solid #9ae6b4;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.2rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* ── BUTTONS ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.48rem 1rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.2s;
        }
        .btn:active { transform: scale(0.97); }
        .btn-primary { background: #2b6cb0; color: #fff; }
        .btn-primary:hover { background: #2c5282; }
        .btn-info { background: #3182ce; color: #fff; }
        .btn-info:hover { background: #2b6cb0; }
        .btn-danger { background: #e53e3e; color: #fff; }
        .btn-danger:hover { background: #c53030; }
        .btn-secondary { background: #718096; color: #fff; }
        .btn-secondary:hover { background: #4a5568; }

        /* ── TABLE ── */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            min-width: 600px;
        }

        thead tr { background: linear-gradient(90deg, #1a365d, #2b6cb0); color: #fff; }
        thead th { padding: 0.9rem 1rem; text-align: left; font-size: 0.85rem; font-weight: 600; }
        tbody tr { border-bottom: 1px solid #e2e8f0; transition: background 0.15s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr.clickable-row { cursor: pointer; }
        tbody tr.clickable-row:hover { background: #ebf8ff; }
        tbody td { padding: 0.85rem 1rem; font-size: 0.88rem; vertical-align: middle; }

        .actions { display: flex; gap: 0.4rem; flex-wrap: wrap; align-items: center; }

        /* ── CARD ── */
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .card h2 { font-size: 1.2rem; color: #1a365d; margin-bottom: 1rem; }
        .card h3 { font-size: 1rem; color: #2d3748; margin-bottom: 0.8rem; }

        /* ── STAT CARDS ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: #fff;
            border-radius: 10px;
            padding: 1.2rem 1.4rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .stat-info .stat-value { font-size: 1.5rem; font-weight: 700; color: #1a365d; }
        .stat-info .stat-label { font-size: 0.78rem; color: #718096; margin-top: 2px; }

        /* ── DETAIL TABLE ── */
        .detail-table { width: 100%; border-collapse: collapse; }
        .detail-table th {
            width: 180px; text-align: left;
            padding: 0.65rem 0.8rem;
            background: #ebf8ff; color: #2c5282;
            font-size: 0.88rem;
            border-bottom: 1px solid #bee3f8;
        }
        .detail-table td {
            padding: 0.65rem 0.8rem;
            font-size: 0.88rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .badge {
            display: inline-block;
            background: #bee3f8; color: #2c5282;
            border-radius: 20px;
            padding: 0.2rem 0.7rem;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .badge-green { background: #c6f6d5; color: #276749; }
        .badge-orange { background: #feebc8; color: #c05621; }

        /* ── MOBILE TOGGLE ── */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.3rem;
            color: #2d3748;
            cursor: pointer;
            padding: 0.3rem;
        }

        @media (max-width: 768px) {
            .sidebar { width: 0; overflow: hidden; }
            .sidebar.open { width: 240px; }
            .topbar { left: 0; }
            .main-wrapper { margin-left: 0; }
            .menu-toggle { display: block; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .container { padding: 1rem; }
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <a href="{{ route('evenements.index') }}" class="sidebar-brand">
        <div class="brand-icon"><i class="fa-solid fa-calendar-days"></i></div>
        <div class="brand-text">GestEvent <span>Gestion des événements</span></div>
    </a>

    <nav class="sidebar-menu">
        <div class="menu-label">Navigation</div>

        <a href="{{ route('evenements.index') }}"
           class="nav-item {{ request()->routeIs('evenements.index') ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-list"></i></div>
            Événements
            <span class="nav-badge" id="ev-count">—</span>
        </a>

        <a href="{{ route('evenements.create') }}"
           class="nav-item {{ request()->routeIs('evenements.create') ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-plus"></i></div>
            Ajouter
        </a>

        <div class="menu-label" style="margin-top:0.5rem;">Données</div>

        <a href="{{ route('experts.index') }}"
           class="nav-item {{ request()->routeIs('experts.*') ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-user-tie"></i></div>
            Experts
        </a>

        <a href="{{ route('ateliers.index') }}"
           class="nav-item {{ request()->routeIs('ateliers.*') ? 'active' : '' }}">
            <div class="nav-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
            Ateliers
        </a>
    </nav>

    <div class="sidebar-footer">
        <i class="fa-solid fa-circle" style="color:#48bb78; font-size:0.6rem;"></i>
        Système actif
    </div>
</aside>

<!-- TOPBAR -->
<div class="topbar">
    <div style="display:flex; align-items:center; gap:1rem;">
        <button class="menu-toggle" onclick="document.getElementById('sidebar').classList.toggle('open')">
            <i class="fa-solid fa-bars"></i>
        </button>
        <span class="topbar-title">@yield('page-title', 'Tableau de bord')</span>
    </div>
    <div class="topbar-right">
        <span style="font-size:0.85rem; color:#718096;">
            <i class="fa-regular fa-clock"></i>
            {{ now()->format('d/m/Y') }}
        </span>
        <div style="display:flex; align-items:center; gap:0.6rem;">
            <div style="text-align:right; line-height:1.3;">
                <div style="font-size:0.85rem; font-weight:600; color:#2d3748;">Administrateur</div>
                <div style="font-size:0.72rem; color:#a0aec0;">admin@gestevent.com</div>
            </div>
            <div style="width:38px; height:38px; border-radius:50%;
                        background:linear-gradient(135deg,#1a365d 0%,#3182ce 100%);
                        display:flex; align-items:center; justify-content:center; flex-shrink:0;
                        box-shadow:0 2px 8px rgba(49,130,206,0.45);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="8" r="4" fill="white"/>
                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- MAIN -->
<div class="main-wrapper">
    <div class="container">
        @if(session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script>
    // Inject event count into sidebar badge
    document.addEventListener('DOMContentLoaded', function () {
        const badge = document.getElementById('ev-count');
        const rows = document.querySelectorAll('tbody tr.clickable-row');
        if (badge && rows.length > 0) badge.textContent = rows.length;
        else if (badge) badge.style.display = 'none';
    });
</script>

</body>
</html>
