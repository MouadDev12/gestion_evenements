<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des événements</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .actions a, .actions button { margin-right: 4px; font-size: 12px; }
        .alert-success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>

    <h2>Liste des événements</h2>

    @if(session('success'))
        <p class="alert-success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Thème</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Description</th>
                <th>Coût journalier</th>
                <th>Expert_id</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evenements as $evenement)
            <tr>
                <td>{{ $evenement->theme }}</td>
                <td>{{ $evenement->date_debut }}</td>
                <td>{{ $evenement->date_fin }}</td>
                <td>{{ $evenement->description }}</td>
                <td>{{ $evenement->cout_journalier }}</td>
                <td>{{ $evenement->expert_id }}</td>
                <td class="actions">
                    <a href="{{ route('evenements.show', $evenement->id) }}">Consulter</a>
                    <a href="#">Modifier</a>
                    <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Supprimer cet événement ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
