<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cours</title>
</head>

<body>

<h1>Ajouter un Cours</h1>

<!-- Affichage des messages de succès -->
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<!-- Formulaire d'ajout -->
<form action="{{ route('cours.store') }}" method="POST">
    @csrf

    <!-- Nom du cours -->
    <label for="nom">Nom du cours :</label>
    <input type="text" name="nom" value="{{ old('nom') }}" required>
    @error('nom')
    <div>{{ $message }}</div>
    @enderror
    <br>

    <!-- Volume horaire -->
    <label for="volume_horaire">Volume horaire :</label>
    <input type="number" name="volume_horaire" value="{{ old('volume_horaire') }}" required>
    @error('volume_horaire')
    <div>{{ $message }}</div>
    @enderror
    <br>

    <!-- Professeur -->
    <label for="id_prof">Professeur :</label>
    <select name="id_prof" required>
            <option value="M.Ly" >Abdoulaye Ly</option>
        <option value="M.Lo" >Abdoulaye Lo</option>

    </select>
    <div>{{ $message }}</div>
    @enderror
    <br>

    <!-- Bouton d'ajout -->
    <button type="submit">Ajouter</button>
</form>

<!-- Affichage des erreurs globales -->
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

</body>

</html>
