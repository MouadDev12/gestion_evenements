<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail de l'événement</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 60%; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background-color: #f2f2f2; width: 180px; }
        h2, h3 { margin-top: 20px; }
    </style>
</head>
<body>

    <h2>Détails de l'événement : {{ $evenement->id }}</h2>

    <table>
        <tr>
            <th>Thème</th>
            <td>{{ $evenement->theme }}</td>
        </tr>
        <tr>
            <th>Date début</th>
            <td>{{ $evenement->date_debut }}</td>
        </tr>
        <tr>
            <th>Date fin</th>
            <td>{{ $evenement->date_fin }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $evenement->description }}</td>
        </tr>
        <tr>
            <th>Coût journalier</th>
            <td>{{ $evenement->cout_journalier }}</td>
        </tr>
        <tr>
            <th>Expert</th>
            <td>{{ $evenement->expert->prenom }} {{ $evenement->expert->nom }}</td>
        </tr>
    </table>

    <h3>Liste des ateliers assurées :</h3>

    <table>
        <thead>
            <tr>
                <th>Nom de l'atelier</th>
                <th>Description de l'atelier</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evenement->ateliers as $atelier)
            <tr>
                <td>{{ $atelier->nom }}</td>
                <td>{{ $atelier->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('evenements.index') }}">retour</a>

</body>
</html>
