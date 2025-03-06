<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Classes</title>
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">

</head>

<body>
<h1>Liste des Cours</h1>

<!-- Affichage des messages de succes ou d'erreur -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Bouton pour ajouter une nouveau cours -->
<button><a href="{{ route('cours.create') }}" class="btn btn-primary">Ajouter une Classe</a></button>
<br>
<br>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Volume Horaire</th>
        <th>Prof</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cours as $crs)
        <tr>
            <td>{{ $classe->id }}</td>
            <td>{{ $classe->nom }}</td>
            <td>{{ $classe->volume_horaire }}</td>
            <td>{{ $classe->id_prof }}</td>
            <td>
                <a href="{{ route('cours.edit', $crs->id) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('cours.destroy', $crs->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir supprimer ce cours ?')">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>

</html>
